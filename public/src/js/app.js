var postId = null;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function() {
    event.preventDefault();
    
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.childNodes[5].dataset['postid'];

    $('#post-body').val(postBody);
    $('#edit-modal').modal('show');
});

$('#modal-save').on('click', function() {
    $.ajax({
        method: 'post',
        url: urlEdit,
        data: {
            body: $('#post-body').val(),
            postId: postId,
            _token: token
        }
    })
        .done(function(msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.childNodes[5].dataset['postid'];

    var isLike = event.target.previousElementSibling == null;
    
    $.ajax({
        method: 'post',
        url: urlLike,
        data: {
            isLike: isLike,
            postId: postId,
            _token: token
        }
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            
            if (isLike)
            {
                event.target.nextElementSibling.innerText = 'Dislike';
            }
            else
            {   
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});