/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// CKEDITOR.on('instanceReady', function (ev) {
	// 	ev.editor.setData('<span style="font-family:Roboto;">&shy;</span>');
	// });
	config.extraPlugins = 'pastefromword';
	config.fillEmptyBlocks = false;
	config.tabSpaces = 0;
	config.removePlugins = 'sourcearea,save,newpage,forms,div,language,image,smiley,iframe,powrfaq,scayt,showblocks,about,stylescombo,elementspath,autosave,autocorrect';
	config.htmlEncodeOutput = false;
	config.entities = false;
	config.entities_latin = false;
	config.font_defaultLabel = 'Roboto';
	config.font_names = 'Roboto';
	// config.pasteFromWordRemoveFontStyles = true;
};
