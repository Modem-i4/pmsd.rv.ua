<?php
// This file is generated. Do not modify it manually.
return array(
	'add-block-btn' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'parts-blocks/add-block-btn',
		'title' => 'Додати блок нижче',
		'category' => 'parts-blocks',
		'icon' => 'plus',
		'description' => 'Кнопка для додавання блоку або патерну під собою',
		'supports' => array(
			'html' => false,
			'lock' => true
		),
		'attributes' => array(
			'lock' => array(
				'type' => 'object',
				'default' => array(
					'move' => true,
					'remove' => true
				)
			),
			'addMode' => array(
				'type' => 'string',
				'enum' => array(
					'block',
					'pattern'
				),
				'default' => 'block'
			),
			'blockName' => array(
				'type' => 'string',
				'default' => 'parts-blocks/materials-card'
			),
			'patternKey' => array(
				'type' => 'string',
				'default' => ''
			),
			'buttonLabel' => array(
				'type' => 'string',
				'default' => '➕ додати матеріал'
			),
			'targetSelector' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'form-checkbox' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/consent-checkbox',
		'title' => 'Consent Checkbox',
		'category' => 'parts-blocks',
		'icon' => 'yes-alt',
		'description' => 'Чекбокс з лейблом і кастомним текстом посилання.',
		'supports' => array(
			'html' => false,
			'anchor' => false,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'fontFamily' => true,
				'fontStyle' => true,
				'fontWeight' => true,
				'letterSpacing' => true,
				'textTransform' => true,
				'textDecoration' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'labelBefore' => array(
				'type' => 'string',
				'default' => 'Я даю згоду на обробку моїх персональних даних. (Будь ласка, ознайомтеся з нашою'
			),
			'linkText' => array(
				'type' => 'string',
				'default' => 'політикою обробки даних'
			),
			'labelAfter' => array(
				'type' => 'string',
				'default' => ', перш ніж надати згоду.)'
			),
			'linkUrl' => array(
				'type' => 'string',
				'default' => '#'
			),
			'isRequired' => array(
				'type' => 'boolean',
				'default' => true
			),
			'inputName' => array(
				'type' => 'string',
				'default' => 'consent'
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'form-checkbox copy' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/consent-checkbox',
		'title' => 'Галочка згоди',
		'category' => 'parts-blocks',
		'icon' => 'yes-alt',
		'description' => 'Згода на використання персональних даних.',
		'supports' => array(
			'html' => false,
			'anchor' => false,
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'fontFamily' => true,
				'fontStyle' => true,
				'fontWeight' => true,
				'letterSpacing' => true,
				'textTransform' => true,
				'textDecoration' => true
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'labelBefore' => array(
				'type' => 'string',
				'default' => 'Я даю згоду на обробку моїх персональних даних для надання відповіді.'
			),
			'linkText' => array(
				'type' => 'string',
				'default' => ''
			),
			'labelAfter' => array(
				'type' => 'string',
				'default' => ''
			),
			'linkUrl' => array(
				'type' => 'string',
				'default' => '#'
			),
			'isRequired' => array(
				'type' => 'boolean',
				'default' => true
			),
			'inputName' => array(
				'type' => 'string',
				'default' => 'consent'
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'form-field' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/form-field',
		'version' => '0.1.0',
		'title' => 'Компонент форми',
		'category' => 'parts-blocks',
		'icon' => 'feedback',
		'description' => 'Універсальні елементи форми: input / textarea і тд.',
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'variant' => array(
				'type' => 'string',
				'default' => 'input'
			),
			'label' => array(
				'type' => 'string',
				'default' => ''
			),
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'placeholder' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'inputType' => array(
				'type' => 'string',
				'default' => 'text'
			),
			'rows' => array(
				'type' => 'number',
				'default' => 4
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'form-field copy' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/form-field',
		'version' => '0.1.0',
		'title' => 'Компонент форми',
		'category' => 'parts-blocks',
		'icon' => 'feedback',
		'description' => 'Універсальні елементи форми: input / textarea і тд.',
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'variant' => array(
				'type' => 'string',
				'default' => 'input'
			),
			'label' => array(
				'type' => 'string',
				'default' => ''
			),
			'name' => array(
				'type' => 'string',
				'default' => ''
			),
			'placeholder' => array(
				'type' => 'string',
				'default' => ''
			),
			'required' => array(
				'type' => 'boolean',
				'default' => false
			),
			'inputType' => array(
				'type' => 'string',
				'default' => 'text'
			),
			'rows' => array(
				'type' => 'number',
				'default' => 4
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'form-submit' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/form-submit',
		'version' => '0.1.0',
		'title' => 'Надсилання форми',
		'category' => 'parts-blocks',
		'icon' => 'feedback',
		'description' => 'Кнопка для надсилання полів з "Компонентів форми"',
		'supports' => array(
			'html' => false,
			'align' => array(
				'left',
				'center',
				'right'
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'submitText' => array(
				'type' => 'string',
				'default' => 'Надіслати'
			),
			'scopeClass' => array(
				'type' => 'string',
				'default' => '.form-scope'
			),
			'action' => array(
				'type' => 'string',
				'default' => '/'
			),
			'method' => array(
				'type' => 'string',
				'default' => 'POST'
			),
			'successMessage' => array(
				'type' => 'string',
				'default' => 'Форму надіслано успішно.'
			),
			'errorMessage' => array(
				'type' => 'string',
				'default' => 'Сталася помилка. Спробуйте ще раз.'
			)
		),
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./frontend.js',
		'style' => 'file:./style-index.css'
	),
	'form-submit copy' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'parts-blocks/form-submit',
		'version' => '0.1.0',
		'title' => 'Надсилання форми',
		'category' => 'parts-blocks',
		'icon' => 'feedback',
		'description' => 'Кнопка для надсилання полів з "Компонентів форми"',
		'supports' => array(
			'html' => false,
			'align' => array(
				'left',
				'center',
				'right'
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'submitText' => array(
				'type' => 'string',
				'default' => 'Надіслати'
			),
			'scopeClass' => array(
				'type' => 'string',
				'default' => '.form-scope'
			),
			'action' => array(
				'type' => 'string',
				'default' => '/'
			),
			'method' => array(
				'type' => 'string',
				'default' => 'POST'
			),
			'successMessage' => array(
				'type' => 'string',
				'default' => 'Форму надіслано успішно.'
			),
			'errorMessage' => array(
				'type' => 'string',
				'default' => 'Сталася помилка. Спробуйте ще раз.'
			)
		),
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./frontend.js',
		'style' => 'file:./style-index.css'
	),
	'materials-card' => array(
		'apiVersion' => 2,
		'name' => 'parts-blocks/materials-card',
		'title' => 'Картка з файлом',
		'category' => 'parts-blocks',
		'icon' => 'media-document',
		'description' => 'Картка з назвою, зображенням та файлом.',
		'attributes' => array(
			'title' => array(
				'type' => 'string',
				'default' => ''
			),
			'file' => array(
				'type' => 'string',
				'default' => ''
			),
			'imageUrl' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'supports' => array(
			'html' => false
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css'
	),
	'news-card' => array(
		'apiVersion' => 2,
		'name' => 'parts-blocks/news-card',
		'title' => 'Картка новин',
		'category' => 'parts-blocks',
		'icon' => 'media-document',
		'description' => 'Картка, що бере дані з поточного запису Query Loop.',
		'supports' => array(
			'html' => false
		),
		'usesContext' => array(
			'postId',
			'postType'
		),
		'attributes' => array(
			'fallbackImage' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'news-slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'design-blocks/news-slider',
		'version' => '0.1.0',
		'title' => 'Слайдер новин',
		'category' => 'design-blocks',
		'icon' => 'slides',
		'description' => 'Глобальний блок-слайдер для новин',
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'postsToShow' => array(
				'type' => 'number',
				'default' => 6
			),
			'slidesPerView' => array(
				'type' => 'number',
				'default' => 3
			),
			'slidesGapPx' => array(
				'type' => 'number',
				'default' => 25
			),
			'fallbackImage' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'editorScript' => 'file:./index.js',
		'style' => array(
			'file:./script.css',
			'file:./style-index.css'
		),
		'viewScript' => 'file:./script.js',
		'render' => 'file:./render.php'
	),
	'qa-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'design-blocks/qa-block',
		'title' => 'Блок Q&A',
		'category' => 'design-blocks',
		'icon' => 'editor-help',
		'description' => 'Питання‑відповідь з анімованою стрілкою та акордеоном.',
		'version' => '0.1.0',
		'keywords' => array(
			'faq',
			'q&a',
			'accordion'
		),
		'supports' => array(
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true
			)
		),
		'attributes' => array(
			'question' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.qa-question'
			),
			'answer' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.qa-answer'
			),
			'open' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'editorScript' => 'file:./index.js',
		'viewScript' => 'file:./frontend.js',
		'style' => 'file:./style-index.css'
	),
	'search-entries' => array(
		'apiVersion' => 2,
		'name' => 'parts-blocks/search-entries',
		'title' => 'Пошук у блоках',
		'category' => 'parts-blocks',
		'icon' => 'search',
		'description' => 'Динамічний пошук по полях інших блоків у редакторі',
		'attributes' => array(
			'targetBlocks' => array(
				'type' => 'string',
				'default' => '.qa-item'
			)
		),
		'supports' => array(
			'html' => false
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./frontend.js'
	),
	'show-more-container' => array(
		'apiVersion' => 2,
		'name' => 'parts-blocks/show-more-container',
		'title' => 'Показати більше',
		'category' => 'parts-blocks',
		'icon' => 'welcome-add-page',
		'description' => 'Контейнер для великого вмісту',
		'attributes' => array(
			'label' => array(
				'type' => 'string',
				'default' => 'Переглянути всі'
			),
			'vhSpc' => array(
				'type' => 'number',
				'default' => 1
			),
			'vhSmobile' => array(
				'type' => 'number',
				'default' => 1
			),
			'mobileOnly' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'html' => false
		),
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./frontend.js'
	)
);
