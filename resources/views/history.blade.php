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
</style>

<div class="highscore">
    
    <!-- logged user game details -->
    <h1>MY HISTORY</h1>
    <table>
        <thead>
            <tr>
                <th>Logged IP</th>
                <th>Game Name</th>
                <th>Time Taken</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($game_hitory_data) && count($game_hitory_data) > 0)
            @foreach ($game_hitory_data as $data)
                @if($data->user_id == auth()->user()->id )
                    <tr>
                        <td>{{ $data->logged_ip }}</td>
                        <td>{{ $data->game_name }}</td>
                        <td>{{ $data->time_taken }}</td>
                    </tr>
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
<article class="content">
    <!-- details table of all users in the system -->
    <h1>SCORE TABLE</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Time Taken</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($game_hitory_data) && count($game_hitory_data) > 0)
                @foreach ( $game_hitory_data as $data)
                    <tr>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->time_taken }}</td>
                        <td>{{ $data->game_name }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No Data Found</td>
                </tr>
            @endif
        </tbody>
    </table>
</article>

<script>
    // REFER SOURCE : chat.openai.com  pagination

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