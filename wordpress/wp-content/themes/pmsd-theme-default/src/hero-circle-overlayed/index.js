import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, MediaUpload, MediaUploadCheck, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { Button, PanelBody } from '@wordpress/components';
import metadata from './block.json';
import './style.scss';

registerBlockType( metadata.name, {
  edit: ({ attributes, setAttributes }) => {
	const { imageUrl } = attributes;

	const onSelectImage = (media) => {
		setAttributes({ imageUrl: media.url });
	};

	return (
		<>
		<InspectorControls>
			<PanelBody title="Image Settings" initialOpen={true}>
			<MediaUploadCheck>
				<MediaUpload
				onSelect={onSelectImage}
				allowedTypes={['image']}
				value={imageUrl}
				render={({ open }) => (
					<Button onClick={open} variant="secondary">
					{imageUrl ? 'Change Image' : 'Choose Image'}
					</Button>
				)}
				/>
			</MediaUploadCheck>
			</PanelBody>
		</InspectorControls>

		<div {...useBlockProps({ className: 'custom-image-block' })}>
			{imageUrl && <img src={imageUrl} alt="Selected" />}
			<div className="overlay-inner">
			<InnerBlocks />
			</div>
      		<div className="ellipse"></div>
		</div>
		</>
	);
	},

  save: ({ attributes }) => {
    const { imageUrl } = attributes;
    return (
      <div className="custom-image-block">
        {imageUrl && <img src={imageUrl} alt="Selected" />}
        <div className="overlay-inner">
          <InnerBlocks.Content />
        </div>
		<div className="ellipse"></div>
      </div>
    );
  }
});
