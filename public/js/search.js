/** */

$('#button-search').click(function () {
    let linkInput = $('input[name="link"]');
    let appCodeInput = $('select[name="app_code"]');

    searchAvatar(appCodeInput.val(), linkInput.val());
})

const searchAvatar = (key, value) => {
    $.ajax({
        url: '/api/search/avatar',
        method: 'post',
        dataType: 'json',
        data: {
            [key]: value,
        },
        success: function(search_info) {
            setImageAvatar(search_info);
            activeImgErrorMessage(false);
        },
        error: function (e) {
            let message = 'Server error';
            if (e.status !== 500) {
                message = e.responseJSON.message;
            } else {
                if (e.responseJSON !== undefined) {
                    message = e.responseJSON.message;
                }
            }

            setImageAvatar(null);
            activeImgErrorMessage(message);
        }
    });
}

const setImageAvatar = (search_info) => {
    let src = '';
    if (search_info) src = search_info.app_icon;

    $('#img-avatar').attr("src", src);
}


const activeImgErrorMessage = (message) => {
    let errorImgMessageDiv = $('#img-avatar-error');
    if (message) {
        return errorImgMessageDiv.text(message);
    }
    return errorImgMessageDiv.text('');
}

