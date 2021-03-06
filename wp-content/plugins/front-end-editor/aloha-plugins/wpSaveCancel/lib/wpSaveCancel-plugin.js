define(['aloha/plugin', 'aloha/floatingmenu', 'i18n!aloha/nls/i18n'], function(Plugin, FloatingMenu, i18nCore){
  var Aloha;
  Aloha = window.Aloha;
  return Plugin.create('wpSaveCancel', {
    init: function(){
      this.saveButton = new Aloha.ui.Button({
        'name': 'wpSave',
        'iconClass': 'SaveFEE',
        'size': 'small',
        'onclick': __bind(this, 'save'),
        'label': FrontEndEditor.data.save_text
      });
      this.cancelButton = new Aloha.ui.Button({
        'name': 'wpCancel',
        'iconClass': 'CancelFEE',
        'size': 'small',
        'onclick': __bind(this, 'cancel'),
        'label': FrontEndEditor.data.cancel_text
      });
      FloatingMenu.addButton('Aloha.continuoustext', this.saveButton, i18nCore.t('floatingmenu.tab.format'), 4);
      return FloatingMenu.addButton('Aloha.continuoustext', this.cancelButton, i18nCore.t('floatingmenu.tab.format'), 4);
    },
    save: function(){
      FrontEndEditor.current_field.ajax_set();
      return this.cancel();
    },
    cancel: function(){
      return FrontEndEditor.current_field.remove_form();
    }
  });
});
function __bind(obj, key){
  return function(){ return obj[key].apply(obj, arguments) };
}