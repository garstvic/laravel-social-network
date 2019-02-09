var postId = null;

$('.post').find('.interaction').find('.edit').on('click', function() {
    event.preventDefault();
    
    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
    postId = event.target.parentNode.parentNode.childNodes[5].childNodes[5].dataset['postid'];
 
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
    $.ajax({
        method: 'post',
        url: url,
        data: {
            body: $('#post-body').val(),
            postId: postId,
            _token: token
        }
    }).done(function(msg) {
        console.log(msg['message']);
    });
});