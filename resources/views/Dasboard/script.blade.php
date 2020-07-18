<script src="{{asset('admin/js/char.js')}}"></script>

<script>


    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Absensi PerBulan'
    },
    subtitle: {
        text: {{date('Y',strtotime(now()))}}
    },
    xAxis: {
        categories: [
            'Januari',
            'Febuari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Augustus',
            'September',
            'October',
            'November',
            'Desember'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            // text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Hadir',
        data: {!!json_encode($bulan)!!}
    }]
});
</script>