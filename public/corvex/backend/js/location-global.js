const string_to_slug = function (str){
  str = str.replace(/^\s+|\s+$/g, '');
  str = str.toLowerCase();

  var from = "àáäâèéëêìíïîòóöôùúüûñçěščřžýúůďťň·/_,:;";
  var to   = "aaaaeeeeiiiioooouuuuncescrzyuudtn------";

  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace('.', '-')
    .replace(/[^a-z0-9 -]/g, '')
    .replace(/\s+/g, '-')
    .replace(/-+/g, '-')
    .replace( /\//g, '' );

  return str;
};

$(document).ready(function(){
  // $('.input-images').imageUploader();

  $('#name').on('change',function(e){
    $('#url').val(string_to_slug($(this).val()))
  });

  $('.tabs span').on('click',function(){
    let span = $(this);
    if(!span.hasClass('active')){
      span.addClass('active').siblings().removeClass('active')
    }
    if(span.text() === 'upload'){
      $('#map-image').show();
      $('#map-image-url').hide()
    }
    if(span.text() === 'url'){
      $('#map-image').hide();
      $('#map-image-url').show()
    }
    $('#map-image-type').val(span.text())
  });

  const Editor = toastui.Editor;
  const commonProp = {
    height: '400px',
    initialEditType: 'markdown',
    placeholder: 'Write content in markdown format!',
  };
  const description = new Editor({
    el: document.querySelector('#description'),
    ...commonProp,
  });

  const address = new Editor({
    el: document.querySelector('#address'),
    ...commonProp,
  });

  let formId = '#location-form-create';

  if(document.querySelector('#location-form-edit')){
    description.setMarkdown(Base64.decode(document.querySelector('#oldDescription').value));
    address.setMarkdown(Base64.decode(document.querySelector('#oldAddress').value));
    $('#list-item').val(Base64.decode($('#listItemInput').val()));

    formId = '#location-form-edit';
  }

  $('#submit-location').on('click', e => {
    e.preventDefault();
    const descriptionHTML = description.getMarkdown();
    const addressHTML = address.getMarkdown();
    if(!!descriptionHTML){
      document.querySelector('#description-input').value = Base64.encode(descriptionHTML);
    }
    if(!!addressHTML){
      document.querySelector('#address-input').value = Base64.encode(addressHTML);
    }

    $('#fieldTitle').val(Base64.encode($('#title').val()));
    $('#fieldCtaTitle').val(Base64.encode($('#cta-title').val()));
    $('#listItemInput').val( Base64.encode($('#list-item').val()));

    $(formId).submit();

  });

});
