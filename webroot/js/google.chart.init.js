google.load("visualization", "1.0", {"packages":["corechart"]});

google.setOnLoadCallback(drawChart);

function drawChart()
{
    $(".chart_div").each(function(index, value){

        data = google.visualization.arrayToDataTable(get( $(this).siblings(".table_data").attr("id") ));

        options = {
            "title"   : $(this).text(),
            animation : {duration: 5000, easing: "out"},
            hAxis     : {title: ''},
            height    : 400,
            width     : 850,
            legend: {position: 'top', textStyle: {fontSize: 10}},
            chartArea: {width: '90%'}
        };

        chart = new google.visualization.ColumnChart(document.getElementById( $(this).attr("id") ));
        chart.draw(data, options);

    });
}


function get(id)
{
    var identify = "#" + id + " tr";

    data = [];

    data_axis_x = [];
    $(identify).each(function(index, value){
        if ( $(this).find(".axis_x").text() != "" ) {
            data_axis_x.push( $(this).find(".axis_x").text() );
        }
    });
    data.push(data_axis_x);

    var qtde_tr   = $(identify + ".row").length;
    var qtde_data = $(identify + ".row").first().find(".data").length;
    for (i = 0; i < qtde_data; i++)
    {
        var aux = [];
        for (j = 0; j < qtde_tr; j++)
        {
            if ( $(identify + ".row").eq(j).find(".data").eq(i).hasClass("string") )
            {
                aux.push( $(identify + ".row").eq(j).find(".data").eq(i).text() );
            }
            else
            {
                aux.push( Number($(identify + ".row").eq(j).find(".data").eq(i).val()) );
            }
        }

        data.push(aux);
    }

    return data;
}