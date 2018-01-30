new WOW().init();

$("#log").click(function(){
      $(".sign_up").addClass("display");
      $(".login").toggleClass("display");
  });
  $("#sign").click(function(){
        $(".login").addClass("display");
        $(".sign_up").toggleClass("display");
    });
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
      $('#postbtn').click(function(e){
        console.log($('#postContent').val());

        if(!$('#postContent').val()){
            alert('is empty');
            e.preventDefault();
        }
        else {
          e.preventDefault();
        $.ajax({
          type:"post",
          url:"\\addpost",
          data:new FormData($('#postform')[0]),
          processData: false,
          contentType: false,
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success : function(data){
          data = JSON.parse(data) ;
            $('#postContent').val("")
            console.log(data);
            var post = '<div class="card">'+
            '<div class="card__header">'+
                '<div class="media">'+
                    '<div class="pull-left">'+
                        '<img class="avatar-img" src="../image/'+data.image+'" alt="">'+
                    '</div>'+
                    '<div class="media-body">'+
                        '<h2> '+ data.name +' <small>Posted on '+ data.created_at +'</small></h2>'+
                   ' </div>'+
               '</div>'+
          '</div>'+
          '<div class="card__body">'+
                '<p>'+ data.post +'</p>'+
                '<div class="wall__attrs">'+
                    '<div class="wall__stats">'+
                        '<span><i class="fa fa-comments act"></i> <a id="coment'+data.id+'">0</a></span>'+
                        '<span><i class="fa fa-heart" id="'+data.id+'" po-id="'+data.id+'"></i> <a id="like'+data.id+'">0</a></span>'+
                    '</div>'+
                '</div>'+
            '</div>' +
            '<div class="wall__comments">'+
                '<div class="wall__comments__lists">'+
                '</div>'+
                '<form class="wall__comments__input">'+
                    '<textarea class="textarea-autosize submit_on_enter" id="input'+data.id+'" p-id="'+data.id+'" placeholder="Write something..."></textarea>'+
               ' </form>'+
            '</div>'+
        '</div>' ;
        $('#pContainer').prepend(post);
        window.location.reload();
          }
        });
      }
      });
      $('.submit_on_enter').bind('keypress', function(e) {
        // enter has keyCode = 13, change it if you want to use another button
        if (e.keyCode == 13) {
          e.preventDefault();
           console.log($(this).val());
          // console.log($(this).attr('p-id'));
          $.ajax({
            type: "get" ,
            url : "\\addcoment",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data : {
              comment : $(this).val(),
              post_id : $(this).attr('p-id')
            } ,
            success : function (data){
              data = JSON.parse(data);
               newComment ='<div class="box-comment" id="comment'+data.id+'">'+
                 '<img class="img-circle img-sm" src="image/'+data.image+'" alt="User Image">'+
                 '<div class="comment-text">'+
                   '<span class="username">'+
                   ''+data.name+''+
                   '<span class="text-muted pull-right">'+data.created_at+'</span>'+
                  ' </span>'+
                   '<p id="com'+data.id+'">'+data.comment+'.</p>'+
                 '</div>'+
                '<div class="actions">'+
                     '<div class="dropdown">'+
                       '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'+
                         '<i class="fa fa-play-circle fa-2x"></i></a>'+
                         '<ul class="dropdown-menu pull-right" role="menu">'+
                             '<li><a onclick="updataComment('+data.id+')" id="updata'+data.id+'">updata</a></li>'+
                             '<li><a onclick="deleteComment('+data.id+')" id="delet'+data.id+'">Delete</a></li>'+
                         '</ul>'+
                     '</div>'+
                 '</div>'+
               '</div>';
                            $('.'+data.post_id+'').append(newComment) ;
                            $('.submit_on_enter').val("");
                            num=parseInt(document.getElementById('coment'+data.post_id+'').innerHTML)+1;
                            document.getElementById('coment'+data.post_id+'').innerHTML=num;
              console.log("coment success ");
              console.log(data);
            }
        });
      }
      });
      function like(id){
        num=parseInt(document.getElementById('li'+id+'').innerHTML)+1;
        document.getElementById('li'+id+'').innerHTML=num;
        $(this).addClass('active');
        $.ajax({
          type:'get',
          url:'\\addlike',
          data:{
            post_id:id
          },
          success : function (data){
            data = JSON.parse(data);
             $(this).addClass('active');
             $('.lo'+data.post_id+'').css('color','blue');
             e=document.getElementById('like'+data.post_id+'');
             e.setAttribute('onclick','unlike('+data.id+','+data.post_id+')');
             $('#like'+data.post_id+'').removeClass('act');
             console.log(data);
          },
        });
      }
function deleteComment(id) {
  console.log(id);
    $.ajax({
      type:'get',
      url:'\\deleteComment',
      data:{
        comment_id:id,
      },
      success:function (data) {
        console.log("delet sucess");
        console.log(data);
        $('#comment'+id+'').remove();
      }
    });
}
function updataComment(id) {
  console.log(id);
    $.ajax({
      type:'get',
      url:'\\updataComment',
      data:{
        comment_id:id,
      },
      success:function (data) {
        console.log(data);
        console.log(id);
        comment=document.getElementById('com'+id+'').innerHTML;
        console.log(comment);
        document.getElementById('input'+data+'').value=comment;
        $('#comment'+id+'').remove();
      }
    });
  }
    $('.like_page').click(function(e){
      e.preventDefault();
      $.ajax({
        type:'post',
        url:'\\follow',
        data:{
          group_id:$('#group_id').val(),
        },
        success:function (data) {
          console.log(data);
          $('.like_page').css({"background-color": "rgb(13, 56, 214)", "color": "#fff"});
        }
      });
    });
    function add_freind(id) {
      $.ajax({
        type:'post',
        url:'\\addfreind',
        data:{
          recive_id:id,
        },
        success:function (data) {
          data = JSON.parse(data);
          console.log(data);
          e=document.getElementById('addf'+data.recive_id+'');
          e.style.color='blue';
          e.setAttribute('onclick','remove_freind_send('+id+')');
          e.setAttribute('id','ref'+data.recive_id+'');
        }
      });
    }
    function addff(id) {
      $.ajax({
        type:'post',
        url:'\\upfreind',
        data:{
          send_id:id,
        },
        success:function (data) {
          data = JSON.parse(data);
          console.log(data);
          $('#addff'+id+'').html("unfreind");
        }
      });
    }
    function deletf(id) {
      $.ajax({
        type:'post',
        url:'\\defreind',
        data:{
          send_id:id,
          recive_id:"no"
        },
        success:function (data) {
          data = JSON.parse(data);
          console.log(data);
          $('#addff'+id+'').remove();
        }
      });
    }

function remove_freind_send(id) {
  $.ajax({
    type:'post',
    url:'\\defreind',
    data:{
      send_id:"no",
      recive_id:id
    },
    success:function (data) {
      console.log(data);
      e=document.getElementById('ref'+id+'');
      e.style.color='white';
      e.setAttribute('id','addf'+id+'');
      e.setAttribute('onclick','add_freind('+id+')');
    }
  });
}
function unlike(id,post_id) {
  $.ajax({
    type:'post',
    url:'\\unlike',
    data:{
      id:id,
      post_id:post_id,
    },
    success:function (data) {
      console.log(data);
      e=document.getElementById('like'+post_id+'');
      e.setAttribute('onclick','like('+post_id+')');
      $('.lo'+post_id+'').css('color','#333');
      $('#like'+post_id+'').removeClass('active');
      $('#like'+post_id+'').addClass('act');
      num=parseInt(document.getElementById('li'+$('#like'+post_id+'').attr('po-id')+'').innerHTML)-1;
      document.getElementById('li'+$('#like'+post_id+'').attr('po-id')+'').innerHTML=num;
    }
  });
}
