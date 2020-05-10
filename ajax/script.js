$(document).ready(function () {
    $('#task1').click(function () {
        $.ajax({
            url: 'handler1.php',
            type: "post",
            data: { publisher: $('#publisher').val() },
            success: function (data) {
                $('#html').text(data);
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#task2').click(function () {
        $.ajax({
            url: 'handler2.php',
            type: "post",
            data: { first_date: $('#first_date').val(), second_date: $('#second_date').val() },
            success: function (data) {
              console.log(data);
                let jsonVal = JSON.parse(data);
                $('#json').text(JSON.stringify(jsonVal));
            },
            error: function (data) {

                console.log("Something went wrong!", data);
            }
        });
    });

    $('#task3').click(function () {
        var xhr = new XMLHttpRequest();
        let author = $('#author').val();
        var params = `BooksByAuthor=${author}`;
        xhr.open('POST', `handler3.php`, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              var result = '<table>';
              console.log(xhr);
              var rows = xhr.responseXML.firstChild.children;
                for (i = 0; i < rows.length;  i++){
                  result += '<tr>';
                  result += '<td>' + rows[i].children[0].firstChild.nodeValue + '</td>';
                  result += '</tr>';
                }
                result += '</table>'
                $('#xml').html(result);
            }
        }
        xhr.send(params);
    });
});
