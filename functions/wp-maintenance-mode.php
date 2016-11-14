<?php 

/**
 * WP Maintenance Mode
 */
add_action('wpmm_head', 'latelierdunsouhait_custom_css');

function latelierdunsouhait_custom_css(){
 echo "<style>

 		@font-face 
		{
			font-family: 'Novecento Wide';
			src: url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.eot');
			src: url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/novecento-wide/demi-bold/Novecentowide-DemiBold.svg#Novecentowide-DemiBold') format('svg');
			font-weight: 600);
			font-style: normal;
		}

		@font-face 
		{
			font-family: 'Adobe Garamond Pro';
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.eot');
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.svg#AGaramondPro-BoldItalic') format('svg');
			font-weight: 700;
			font-style: italic;
		}

		@font-face 
		{
			font-family: 'Adobe Garamond Pro';
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.eot');
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold-italic/AGaramondPro-BoldItalic.svg#AGaramondPro-BoldItalic') format('svg');
			font-weight: 700;
			font-style: italic;
		}

		@font-face 
		{
			font-family: 'Adobe Garamond Pro';
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.eot');
			src: url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/adobe-garamond-pro/bold/AGaramondPro-Bold.svg#AGaramondPro-Bold') format('svg');
			font-weight: 700;
			font-style: normal;
		}

		@font-face 
		{
			font-family: 'Avenir Next Condensed';
			src: url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.eot');
			src: url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium-italic/AvenirNextCondensed-MediumItalic.svg#AvenirNextCondensed-MediumItalic') format('svg');
			font-weight: 700;
			font-style: italic;
		}

		@font-face 
		{
			font-family: 'Avenir Next Condensed';
			src: url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.eot');
			src: url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.eot?#iefix') format('embedded-opentype'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.woff2') format('woff2'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.woff') format('woff'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.ttf') format('truetype'),
				url('" . get_template_directory_uri() . "/fonts/avenir-next/medium/AvenirNextCondensed-Medium.svg#AvenirNextCondensed-Medium') format('svg');
			font-weight: 400;
			font-style: regular;
		}

		html
		{
			height: 100%;
			width: 100%;
		}
 		body
 		{
 			display: table;
 			width: 100%;
 			height: 100%;
 			background-color: #2f344a;
 			background-image: url('" . get_template_directory_uri() . "/img/maintenance-bg.jpg');
 			background-size: cover;
 			background-position: center;
 		}
		
	
 		.wrap
 		{
 			display: table-cell;
			width: 100%;
			text-align: center;
			vertical-align: middle;
 		}
		.wrap h2:first-child
		{
			margin: 0;
		}
       	h2
       	{
       		font-size: 35px;
       	 	text-transform: uppercase;
       	 	letter-spacing: 0.3em;
       	 	color: #ffffff;
       	 	font-family: 'Novecento Wide', serif;
       	}
       h1
       {
       		font-size: 85px!important;
			color: #d17883!important;
			font-family: 'Adobe Garamond Pro', serif;
			font-weight: 700;
			font-style: normal;
			line-height: 85px;
			letter-spacing: 0.3em;
			text-transform: uppercase;
       }
       h1 em
       {
       		color: #d17883;
       		font-family: 'Adobe Garamond Pro', serif;
       		font-weight: normal;
       		font-size: 85px!important;
       		font-style: italic!important;
       		line-height: normal;
       		letter-spacing: 0;
       		text-transform: none;
       }
       em
       {
       		font-size: 30px;
       		color: #ffffff;
       		font-family: 'Avenir Next condensed', serif;
       		font-weight: 500;
       		font-style: italic;
       }
       .phone
       {
       		font-size: 30px;
       		color: #fadcdd;
       		letter-spacing: 0.05em;
       		font-family: 'Avenir Next condensed', serif;
       		font-weight: 400;
       }
       </style>";
}