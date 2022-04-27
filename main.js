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
                        Дата доставки: ${data["date"]}		
                    </div>
                    <div class="col-md-4">
                        Стоимость: ${data["price"]}	руб.	
                    </div>
               
                `
            );
            
        }, "json");
        
    });
});