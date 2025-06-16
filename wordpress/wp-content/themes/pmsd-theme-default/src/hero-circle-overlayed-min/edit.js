import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function Edit() {
	return (
		<p { ...useBlockProps() }>
			{ __(
				'Hero Circle Overlayed – hello from the editor!',
				'hero-circle-overlayed'
			) }
		</p>
	);
}
