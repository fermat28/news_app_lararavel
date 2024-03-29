$('select').on('change', function() {
    let source = this.value;  //gets the selected news source from the news source dropdown menu
    let _token = $('meta[name="csrf-token"]').attr('content');
    console.log(source);
    console.log($('meta[name="csrf-token"]').attr('content'));
    $.ajax({
         headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: "/sourceId",
        data: { source : source, _token: "{{ csrf_token() }}", }, //posts the selected option to our ApiController file
        success:function(result){
            $("#spinner").hide();
            $("#news").show();
            // On success it gets `result`, which is a full html page that displays top news from the news source selected.
            $('#appendDivNews').html(result);    // Append the html result to the div that has an id  of  `appendDivNews`
        },

        error:function(){
            $("#spinner").hide();
            $("#news").show();
            alert("An error occurred, please try again!")
        }
    });

})
