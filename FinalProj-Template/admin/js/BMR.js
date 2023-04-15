function BMR_RMI()
        {
         let weight = document.getElementById("WeightValue").value;
         let height = document.getElementById("TallValue").value;
         let age =    document.getElementById("AgeValue").value;
         let bmr,gender;
        
         var radio=document.getElementsByName('gender');
         for(i=0;i<radio.length;i++)
         {
           if(radio[i].checked)
           gender=(radio[i].value);
         } 

         if (gender === "male") 
         {
          bmr = 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
         } else if (gender === "female") {
          bmr = 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
         } 
        
         let dailyCalories;
         let activityLevel = document.getElementById("activityLevel").value;
        
         switch (activityLevel)
         {
            case "sedentary":
            dailyCalories = bmr * 1.2;
            break;
            case "lightly active":
           dailyCalories = bmr * 1.375;
            break;
            case "moderately active":
            dailyCalories = bmr * 1.55;
            break;
            case "very active":
            dailyCalories = bmr * 1.725;
            break;
            case "extremely active":
            dailyCalories = bmr * 1.9;
            break;
            default:
            dailyCalories=("Invalid activity level entered.");
         }
          let bmi = weight / (height ** 2);
         let w;
         if (bmi < 18.5) {
         w= "Underweight";
         } else if (bmi >= 18.5 && bmi <= 24.9) {
         w= "Normal weight";
         } else if (bmi >= 25 && bmi <= 29.9) {
         w= "Overweight";
         } else {
         w="Obese";
         }
         
         alert(`Your daily calorie needs are ${dailyCalories.toFixed(2)} calories.`);
         //document.getElementById("result").innerHTML=(`Your daily calorie needs are ${dailyCalories.toFixed(2)}${bmi.toFixed(2)} calories.`);
    
        }
        