$( document ).ready(function() {
    function SendRequestCalc(){
        console.log('Send');
        let formData =$('#calc_form').serialize()
        $.ajax({
            type: "POST",
            url: '/ajax.php',
            data: formData,
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                //Анимация изменения цены
                $({countNum: 1}).animate(
                    {
                        countNum: jsonData.TOTAL_CARD
                    },
                    {
                        duration: 400,
                        easing: "linear",
                        step: function () {
                            $('.result_price').text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $('.result_price').text((this.countNum).toLocaleString('ru'));
                        }
                    }
                );

            }
        });

    }

    SendRequestCalc();
    $('.change-input').change(function(){
        SendRequestCalc();
    });
});