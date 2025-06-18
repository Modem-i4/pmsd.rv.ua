import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import metadata from './block.json';
import './style.scss';

registerBlockType(metadata.name, {
    edit: ({ attributes, setAttributes }) => {
    const blockProps = useBlockProps();
        return (
        <>
            <InspectorControls>
                <PanelBody title="Налаштування">
                    <RangeControl
                        label="Кількість новин на слайд"
                        value={attributes.postsToShow}
                        onChange={(val) => setAttributes({ postsToShow: val })}
                        min={3}
                        max={12}
                        step={3}
                    />
                </PanelBody>
            </InspectorControls>

            <div {...blockProps}>
                <p><strong>Слайдер новин:</strong> буде видно на фронтенді.</p>
            </div>
        </>
        );
    },
    save: () => null // Рендериться через PHP
});
