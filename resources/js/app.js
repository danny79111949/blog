
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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


$.ajaxSetup({

    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});

deletePost = function(id)
{
    let result = confirm('確定要刪除這篇文章嗎?');
    if(result)
    {
        let actionUrl = '/posts/'+id;
        $.post(actionUrl,{_method:'delete'}).done(function(){
            location.href ='/posts/admin';
        });
    }
}; 

deleteCategory = function(id)
{
    let result = confirm('確定要刪除這個分類嗎?');
    if(result)
    {
        let actionUrl = '/categories/'+id;
        $.post(actionUrl,{_method:'delete'}).done(function(){
            location.href ='/categories';
        });
    }
};


deleteTag = function(id)
{
    let result = confirm('確定要刪除這個標籤嗎?');
    if(result)
    {
        let actionUrl = '/tags/'+id;
        $.post(actionUrl,{_method:'delete'}).done(function(){
            location.href ='/tags';
        });
    }
};