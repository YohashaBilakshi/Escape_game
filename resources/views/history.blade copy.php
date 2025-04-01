<style>
    body {
        font-family: "Permanent Marker", cursive;
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
        background-color: #c37c3e;
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
    .tab-nav {
    display: flex;
    /* margin-bottom: 20px; */
}

.tab-button {
    font-family: "Permanent Marker", cursive;
    padding: 10px 20px;
    margin: 0 5px;
    cursor: pointer;
    /* background-color: #f1f1f1; */
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.tab-button.active {
    background-color: #c37c3e;
    color: #000000;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}
</style>

<article class="content">

    <div class="container">
        <div class="tab-nav">
            <button class="tab-button active" onclick="showTab('home')">Home</button>
            <button class="tab-button" onclick="showTab('profile')">Profile</button>
        </div>

        <div id="home" class="tab-content active">
            <table>
                <thead>
                    <tr>
                        <th>Logged At</th>
                        <th>IP</th>
                        <th>Time Taken</th>
                        <th>Level</th>
                        <th>Staus</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $game_hitory_data as $data)

                    <tr>
                        <td>{{ $data->logged_time }}</td>
                        <td>{{ $data->logged_ip }}</td>
                        <td>{{ $data->time_taken }}</td>
                        <td>{{ $data->level }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div id="profile" class="tab-content">
        <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Time Score</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ( $game_hitory_data as $data)

                    <tr>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->time_taken }}</td>
                        <td>{{ $data->level }}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</article>

<script>
    //chat gpt
     function showTab(tabName) {
        var tabs = document.querySelectorAll('.tab-content');
        var buttons = document.querySelectorAll('.tab-button');

        // Hide all tabs
        tabs.forEach(function(tab) {
            tab.classList.remove('active');
        });

        // Remove active class from all buttons
        buttons.forEach(function(button) {
            button.classList.remove('active');
        });

        // Show the selected tab
        document.getElementById(tabName).classList.add('active');
        event.target.classList.add('active');
    }
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