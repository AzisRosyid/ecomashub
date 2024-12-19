
document.getElementById('exportButton').addEventListener('click', function () {
    // Create the OAS (transaction evidence) content
    const oasContent = `
            <div class="oas-content">
                <h3>Transaction Evidence</h3>
                <ul>
                    <li><strong>Kategori:</strong> {{ $st->category }}</li>
                    <li><strong>Tipe:</strong> {{ $st->type }}</li>
                    <li><strong>Nilai:</strong> {{ $st->formatted_value }}</li>
                    <li><strong>Tanggal:</strong> {{ $st->formatted_date }}</li>
                </ul>
            </div>
        `;

    // Insert the OAS content into a container (e.g., a modal or dedicated div)
    const oasContainer = document.getElementById('oasContainer');
    oasContainer.innerHTML = oasContent;

    // Show the container (assuming it's hidden by default)
    oasContainer.style.display = 'block';
});
