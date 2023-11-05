<script>
  let dateDropdown = document.getElementById('date-dropdown'); 
       
  let currentYear = new Date().getFullYear();    
  let earliestYear = 2020;     
  while (currentYear >= earliestYear) {      
    let dateOption = document.createElement('option');          
    dateOption.text = currentYear;      
    dateOption.value = currentYear;        
    dateDropdown.add(dateOption);      
    currentYear -= 1;    
  }
</script>