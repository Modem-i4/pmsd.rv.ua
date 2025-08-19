import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { ToggleControl, PanelBody } from '@wordpress/components';
import { useCallback } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
  const { question, answer, open } = attributes;

  const onToggle = useCallback(() => {
    setAttributes({ open: !open });
  }, [open, setAttributes]);

  const blockProps = useBlockProps({
    className: `qa-item ${open ? 'is-open' : ''}`,
    'aria-expanded': open ? 'true' : 'false'
  });

  return (
    <>
      <InspectorControls>
        <PanelBody title="Налаштування">
          <ToggleControl
            label="Відкрито за замовчуванням"
            checked={ !!open }
            onChange={ (val) => setAttributes({ open: val }) }
          />
        </PanelBody>
      </InspectorControls>

      <div {...blockProps}>
        <button type="button" className="qa-summary" onClick={onToggle}>
          <span className="qa-arrow" aria-hidden="true" />
          <RichText
            tagName="span"
            className="qa-question"
            placeholder="Введіть питання…"
            value={ question }
            onChange={ (val) => setAttributes({ question: val }) }
            allowedFormats={ [] }
          />
        </button>

        <div className="qa-content">
          <div className="qa-content-inner">
            <RichText
              tagName="div"
           		className="qa-answer"
              placeholder="Напишіть відповідь…"
              value={ answer }
              onChange={ (val) => setAttributes({ answer: val }) }
            />
          </div>
        </div>
      </div>
    </>
  );
}
