$(document).ready(function () {
    $('#isavailablementoring').bootstrapSwitch({
        'onText': 'Yes',
        'offText': 'No'
    });
    $('#isstudent').bootstrapSwitch({
        'onText': 'Yes',
        'offText': 'No'
    });

    var usersSkills = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: urlUsersSkills
    });

    $('#skills').tokenfield({
        typeahead: [
            null,
            {
                name: 'userSkills',
                source: usersSkills
            }
        ]
    });

    $('#skills').on('tokenfield:createtoken', function (event) {
        var existingTokens = $(this).tokenfield('getTokens');
        $.each(existingTokens, function(index, token) {
            if (token.value === event.attrs.value)
                event.preventDefault();
        });

        var available_tokens = usersSkills.index.datums;
        var exists = true;
        $.each(available_tokens, function(index, token) {
            if (token === event.attrs.value) {
                exists = false;
            }
        });
        if(exists === true)
            event.preventDefault();
    });
});