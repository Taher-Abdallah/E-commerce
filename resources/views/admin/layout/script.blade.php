    <script src="{{asset('admin-assets')}}/js/jquery.min.js"></script>
    <script src="{{asset('admin-assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('admin-assets')}}/js/bootstrap-select.min.js"></script>   
    <script src="{{asset('admin-assets')}}/js/sweetalert.min.js"></script>    
    <script src="{{asset('admin-assets')}}/js/apexcharts/apexcharts.js"></script>
    <script src="{{asset('admin-assets')}}/js/main.js"></script>
    <script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imgpreview');
        output.style.display = 'block'; // اعرض العنصر
        output.querySelector('img').src = reader.result; // حط الصورة الجديدة
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<script>
    document.getElementById("gFile").addEventListener("change", function(event) {
        let previewContainer = document.getElementById("preview-images");
        previewContainer.innerHTML = ""; // يمسح القديم لو عملت اختيار جديد

        // مر على كل الصور المختارة
        [...event.target.files].forEach(file => {
            let reader = new FileReader();
            reader.onload = function(e) {
                let img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "100px";
                img.style.height = "100px";
                img.style.objectFit = "cover";
                img.style.borderRadius = "8px";
                img.style.border = "1px solid #ddd";
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });
</script>

<script>
function previewNewImage(event) {
    const file = event.target.files[0];
    if (file) {
        // اخفاء الصورة القديمة
        document.getElementById('current-image').style.display = 'none';

        // عرض الصورة الجديدة
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-img');
            preview.src = e.target.result;
            document.getElementById('new-preview').style.display = 'flex';
        }
        reader.readAsDataURL(file);
    }
}
</script>
    <script>
        (function ($) {

            var tfLineChart = (function () {

                var chartBar = function () {

                    var options = {
                        series: [{
                            name: 'Total',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Pending',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00, 0.00, 0.00, 0.00]
                        },
                        {
                            name: 'Delivered',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }, {
                            name: 'Canceled',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00]
                        }],
                        chart: {
                            type: 'bar',
                            height: 325,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '10px',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false,
                        },
                        colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                        stroke: {
                            show: false,
                        },
                        xaxis: {
                            labels: {
                                style: {
                                    colors: '#212529',
                                },
                            },
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        },
                        yaxis: {
                            show: false,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return "$ " + val + ""
                                }
                            }
                        }
                    };

                    chart = new ApexCharts(
                        document.querySelector("#line-chart-8"),
                        options
                    );
                    if ($("#line-chart-8").length > 0) {
                        chart.render();
                    }
                };

                /* Function ============ */
                return {
                    init: function () { },

                    load: function () {
                        chartBar();
                    },
                    resize: function () { },
                };
            })();

            jQuery(document).ready(function () { });

            jQuery(window).on("load", function () {
                tfLineChart.load();
            });

            jQuery(window).on("resize", function () { });
        })(jQuery);
    </script>