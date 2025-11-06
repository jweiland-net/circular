jQuery(document).ready(function () {
  jQuery('#dialogHint').dialog({
    autoOpen: false,
    height: 150,
    width: 300,
    modal: true
  });

  jQuery('dd.showHint')
    .css('cursor', 'pointer')
    .click(function () {
      jQuery('#dialogHint').dialog('open');
    });
});
