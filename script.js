// Wait for the entire HTML document to load before executing our script
document.addEventListener("DOMContentLoaded", function() {
    
    // Toggle logic for My Violations vs General Rules
    const viewToggle = document.getElementById("viewToggle");
    const generalViolationsSection = document.getElementById("generalViolationsSection");
    const myViolationsSection = document.getElementById("myViolationsSection");
    
    if (viewToggle) {
        viewToggle.addEventListener("change", function() {
            if (this.checked) {
                // Toggle is ON: Show My Violations, Hide General Rules
                generalViolationsSection.classList.add("hidden");
                myViolationsSection.classList.remove("hidden");
            } else {
                // Toggle is OFF: Show General Rules, Hide My Violations
                myViolationsSection.classList.add("hidden");
                generalViolationsSection.classList.remove("hidden");
            }
        });
    }
});
