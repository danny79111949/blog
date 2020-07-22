
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



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

toggleCommentForm = function(e){
    $(e.currentTarget).closest('.comment-info').siblings('.comment-body').toggleClass('edit');
};

$('form.update-comment').submit(function(e){
    e.preventDefault();
    let comment = $(e.currentTarget).find('[name="comment"]').val();
    let post_id = $(e.currentTarget).find('[name="post_id"]').val();
    let name = $(e.currentTarget).find('[name="name"]').val();
    $.post($(e.currentTarget).attr('action'),{
        _method:'put',
        comment:comment,
        name:name,
        post_id:post_id,
    }).done(function(data){
        $(e.currentTarget).closest('.comment-body').toggleClass('edit');
        $(e.currentTarget).siblings('p').html(comment);
    });
});

deleteComment = function(e){
    let result = confirm('請問你真的要刪除留言嗎?');
    let action = $(e.currentTarget).data('action');
    let comment = $(e.currentTarget).closest('.media');
    if(result){
        $.post(action,{ _method:'delete',}).done(function(data){
            comment.remove();
        });
    }
};