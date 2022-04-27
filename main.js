$(document).ready(function() {



    $(".myform").submit(function(event) {
        event.preventDefault();
        let formData = $(this).serialize();

        $.post("calc.php", formData, (data) => {
            
            $(".prices").append(
                `
                
                    
                    <div class="col-md-4">
                        Транспортная компания: ${data["transportCompany"]}	
                    </div>
                    <div class="col-md-4">
                        Время доставки, дней: ${data["period"]}		
                    </div>
                    <div class="col-md-4">
                        Стоимость: ${data["price"]}	руб.	
                    </div>
               
                `
            );
            
        }, "json");
        
    });
});