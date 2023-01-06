import './bootstrap';

// $(document).ready(function(){
//     $('.btn').click(function(e){
//         // e.preventDefault();
//         let title = $('#title').val();
//         let message = $('#message').val();

//         $ajax({
//             method:'post',
//             url:'/send',
//             data:{'title':title,'message':message},
//             success:function(res){

//             }
//         })
//     });

// });

window.Echo.channel('message')
.listen('.message', (e)=>{
    $('#message').append('<p>'+ e.title + ':' + e.message + '</p>')
});

import Echo from 'laravel-echo';
   
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ":" + window.laravel_echo_port
});