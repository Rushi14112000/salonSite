<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <span class="material-symbols-outlined" id="fileInputTrigger">add_a_photo</span>
    <input type="file" id="fileInput" name="photo" accept=".png, .jpg, .jpeg" style="display: none;">
    
    <script>
        // Get references to the trigger element and the hidden file input
        const fileInputTrigger = document.getElementById("fileInputTrigger");
        const fileInput = document.getElementById("fileInput");
        
        // Add a click event listener to the trigger element
        fileInputTrigger.addEventListener("click", function () {
            // Simulate a click on the hidden file input when the trigger is clicked
            fileInput.click();
        });
        
        // Add a change event listener to the file input to handle file selection
        fileInput.addEventListener("change", function () {
            // Get the selected file (if any)
            const selectedFile = fileInput.files[0];
            
            // You can now handle the selected file as needed, for example, display its name
            if (selectedFile) {
                alert("Selected file: " + selectedFile.name);
            }
        });
    </script>
</body>
</html>
