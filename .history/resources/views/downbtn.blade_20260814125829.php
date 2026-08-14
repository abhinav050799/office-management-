<button type="button" onclick="downloadImage()">
    Download
</button>

<script>
async function downloadImage() {
    const imageUrl = "https://res.cloudinary.com/lightspeed-retail/image/upload/wqo8pj96n9vpizccjoav";

    try {
        const response = await fetch(imageUrl);
        const blob = await response.blob();

        const url = window.URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = url;
        a.download = "image.jpg";
        document.body.appendChild(a);
        a.click();

        a.remove();
        window.URL.revokeObjectURL(url);
    } catch (error) {
        console.error(error);
        alert("Image download nahi ho payi.");
    }
}
</script>