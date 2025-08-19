import { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import metadata from './block.json';

export default function Edit( { attributes, setAttributes, context } ) {
  const { fallbackImage = '' } = attributes;
  const { postId, postType } = context || {};
  const blockProps = useBlockProps({ className: 'news-latest-card' });

  // витягуємо пост, медіа і категорії з data store
  const { post, media, cats } = useSelect( ( select ) => {
    if ( !postId || !postType ) return { post: null, media: null, cats: [] };
    const core = select('core');
    const p = core.getEntityRecord('postType', postType, postId);
    const m = p?.featured_media ? core.getMedia(p.featured_media) : null;
    const c = p?.categories?.length ? core.getEntityRecords('taxonomy','category', { include: p.categories }) : [];
    return { post: p, media: m, cats: c || [] };
  }, [postId, postType] );

  // проста функція "N часу тому" для прев’ю
  const timeAgo = (iso) => {
    if (!iso) return '';
    const diff = (Date.now() - new Date(iso).getTime()) / 1000;
    const h = Math.floor(diff / 3600);
    if (h < 1) return `${Math.max(1, Math.floor(diff/60))} хв тому`;
    if (h < 24) return `${h} год тому`;
    return `${Math.floor(h/24)} дн тому`;
  };

  const title = post?.title?.rendered ? post.title.rendered.replace(/<[^>]*>/g, '') : '';
  const link  = post?.link || '#';
  const img   = media?.source_url || (fallbackImage || '');
  const catName = cats?.[0]?.name || 'Публікація';
  const dateHuman = timeAgo(post?.date_gmt || post?.date);

  return (
    <>
      <InspectorControls>
        <PanelBody title="Налаштування картки" initialOpen={ true }>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={ (m) => setAttributes({ fallbackImage: m?.url || '' }) }
              allowedTypes={ ['image'] }
              render={ ({ open }) => (
                <Button variant="secondary" onClick={ open }>
                  { fallbackImage ? 'Змінити fallback‑зображення' : 'Обрати fallback‑зображення' }
                </Button>
              ) }
            />
          </MediaUploadCheck>
          { !!fallbackImage && (
            <Button variant="link" onClick={ () => setAttributes({ fallbackImage: '' }) } style={{ marginTop: 8 }}>
              Прибрати fallback
            </Button>
          ) }
        </PanelBody>
      </InspectorControls>

      {/* прев’ю картки в редакторі (без SSR) */}
      { post ? (
        <div {...blockProps}>
          <a className="card-wrapper" href={ link } onClick={(e)=>e.preventDefault()}>
            <div className="card-image-wrapper">
              { img
                ? <img src={img} alt={title || ''} className="card-image" />
                : <div className="card-image-placeholder" />
              }
            </div>

            <div className="card-gradient-bar" />

            <div className="card-content">
              <h3 className="card-title">{ title || 'Без назви' }</h3>
              <div className="card-meta">
                <div className="card-type">{ catName }</div>
                <div className="card-date">{ dateHuman }</div>
              </div>
            </div>
          </a>
        </div>
      ) : null }
    </>
  );
}
