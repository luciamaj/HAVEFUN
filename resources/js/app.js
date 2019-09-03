/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


//comics&af checkbox
$('.checked_all').on('change', function() {
                $('.checkbox').prop('checked', $(this).prop("checked"));
        });
        //deselect "checked all", if one of the listed checkbox product is unchecked amd select "checked all" if all of the listed checkbox product is checked
$('.checkbox').change(function(){ //".checkbox" change
  if($('.checkbox:checked').length == $('.checkbox').length){
     $('.checked_all').prop('checked',true);
  }else{
    $('.checked_all').prop('checked',false);
  }
});

//search
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

//click to show info
$(document).ready(function(){
  var value = $('.showMe option:selected').text().trim();
  console.log(value);
  if (value === 'Rare') {
    console.log('here1');
    $('.rare-form').show();
  } else {
    console.log('here2');
    $('.rare-form').hide();
  }

  $('.showMe').change(function() {
    $('.rare-form').toggle();
  });
});
