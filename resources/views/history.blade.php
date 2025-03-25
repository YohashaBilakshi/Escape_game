<style>
    body {
        font-family: "Permanent Marker", cursive;;
        text-align: center;
        margin-top: 0px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th,
    td {
        border-bottom: 2px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        border-width: 1px 1px 0;
        background-color:#c37c3e;
    }

    .content {
        margin: 20px 100px 20px 105px;
    }

    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination button {
        padding: 5px 10px;
        margin: 0 5px;
        cursor: pointer;
        /* outline: 1px solid #494a4f; */
        border-radius: 1px;
        border: none;
        border: #b39b4a;
        background-color: #e1904a;
        border-radius: 8px;
    }

    .hidden {
        clip: rect(0 0 0 0);
        clip-path: inset(50%);
        height: 1px;
        overflow: hidden;
        position: absolute;
        white-space: nowrap;
        width: 1px;
    }

    .pagination button.active {
        background-color: #c37c3e;
        font-weight: bold;
    }
</style>

<article class="content">
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Started At</th>
                <th>Time Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Faith Andrew</td>
                <td>Angela Christopher</td>
                <td>David Elias</td>
            </tr>
            <tr>
                <td>Mirabel Anthony</td>
                <td> Stella Kai</td>
                <td>Mercy Logan</td>
            </tr>
            <tr>
                <td>Lola Aiden</td>
                <td>John David</td>
                <td>Nathan Luca</td>
            </tr>
            <tr>
                <td>Emmanuel Adrian</td>
                <td>Deborah Aaron</td>
                <td>Esther Camaeron</td>
            </tr>
            <tr>
                <td>Claire Davis</td>
                <td>Femi Grey</td>
                <td>Micah Obi</td>
            </tr>
            <tr>
                <td>Abdul Ahmed</td>
                <td>Clement White</td>
                <td>Margot Hassan</td>
            </tr>
            <tr>
                <td>Emily Luke</td>
                <td>Ralph David</td>
                <td>James William</td>
            </tr>
            <tr>
                <td>Micheal Andrew</td>
                <td>Venita Blue</td>
                <td>Oyin Ade</td>
            </tr>
        </tbody>
    </table>
</article>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const content = document.querySelector('.content');
        const itemsPerPage = 5;
        let currentPage = 0;
        const items = Array.from(content.getElementsByTagName('tr')).slice(1);

        function showPage(page) {
            const startIndex = page * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            items.forEach((item, index) => {
                item.classList.toggle('hidden', index < startIndex || index >= endIndex);
            });
            updateActiveButtonStates();
        }

        function createPageButtons() {
            const totalPages = Math.ceil(items.length / itemsPerPage);
            const paginationContainer = document.createElement('div');
            const paginationDiv = document.body.appendChild(paginationContainer);
            paginationContainer.classList.add('pagination');

            // Add page buttons
            for (let i = 0; i < totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i + 1;
                pageButton.addEventListener('click', () => {
                    currentPage = i;
                    showPage(currentPage);
                    updateActiveButtonStates();
                });

                content.appendChild(paginationContainer);
                paginationDiv.appendChild(pageButton);
            }
        }

        function updateActiveButtonStates() {
            const pageButtons = document.querySelectorAll('.pagination button');
            pageButtons.forEach((button, index) => {
                if (index === currentPage) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });
        }

        createPageButtons();
        showPage(currentPage);
    });
</script>