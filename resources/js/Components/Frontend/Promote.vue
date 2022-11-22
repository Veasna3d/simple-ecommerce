<template>
    <div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700 overflow-x-hidden">
        <!-- trusted by -->
		<div class="max-w-4xl mx-auto text-center">
            <h1 class="font-bold text-darken my-3 text-2xl">Special Offer <span class="text-yellow-500">20%</span></h1>
			<h1 id="demo" class="font-bold text-danger my-3 text-2xl"></h1>
		</div>
        
    </div>
</template>

<script setup>
// Set the date we're counting down to
var countDownDate = new Date("Dec 5, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + " Days - " + hours + " Hours - "
  + minutes + " Minutes - " + seconds + " Seconds ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>