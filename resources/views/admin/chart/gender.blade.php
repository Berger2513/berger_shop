
<input type="hidden" name="" id='gender' value="{{json_encode($gender)}}">
<input type="hidden" name="" id='gender_value' value="{{json_encode($gender_value)}}">
<input type="hidden" name="" id='gender_color' value="{{json_encode($gender_color)}}">

<canvas id="doughnut" width="200" height="200"></canvas>
<script>
$(function () {
            
    var gender_json = $('#gender').val();
    var gender = JSON.parse(gender_json);

    var gender_value_json = $('#gender_value').val();
    var gender_value = JSON.parse(gender_value_json);
    

    var gender_color_json = $('#gender_color').val();
    var gender_color = JSON.parse(gender_color_json);

     
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: gender_value,
                backgroundColor: gender_color
            }],
            labels:gender
        },
        options: {
            maintainAspectRatio: false
        }
    };

    var ctx = document.getElementById('doughnut').getContext('2d');
    new Chart(ctx, config);
});
</script>
<!-- <canvas id="myChart" width="1500" height="400"></canvas>
<script>
$(function () {
    var gender_json = $('#gender').val();
    var gender = JSON.parse(gender_json);

    var gender_value_json = $('#gender_value').val();
    var gender_value = JSON.parse(gender_value_json);
    

    var gender_color_json = $('#gender_color').val();
    var gender_color = JSON.parse(gender_color_json);
     console.log(gender_color);
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: gender,
            datasets: [{
                label: '分类统计',
                data: gender_value,
                backgroundColor: gender_color,
                borderColor: gender_color,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
</script> -->