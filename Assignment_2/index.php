
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        #app {
            max-width: 400px;
            width: 100%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: calc(100% - 90px);
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #80bdff;
            outline: none;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }
        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }
        li.completed {
            text-decoration: line-through;
            color: #6c757d;
            background-color: #e2e3e5;
        }
        li:hover {
            background-color: #f1f1f1;
        }
        .delete-button {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>To-Do List</h1>
        <div>
            <input type="text" id="new-todo" placeholder="Add new to-do" aria-label="New to-do" />
            <button id="add-todo">Add</button>
        </div>
        <ul id="todo-list"></ul>
    </div>

    <script>
        const todoApp = () => {
            let todos = [];

            const createTodoItem = (todo, index) => {
                const li = document.createElement('li');
                li.innerText = todo.text;
                li.className = todo.completed ? 'completed' : '';

                li.addEventListener('click', () => {
                    todos[index].completed = !todos[index].completed;
                    render();
                });

                const deleteButton = document.createElement('button');
                deleteButton.innerText = 'Delete';
                deleteButton.className = 'delete-button';
                deleteButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    todos.splice(index, 1);
                    render();
                });

                li.appendChild(deleteButton);
                return li;
            };

            const render = () => {
                const todoList = document.getElementById('todo-list');
                todoList.innerHTML = '';
                todos.forEach((todo, index) => {
                    todoList.appendChild(createTodoItem(todo, index));
                });
            };

            const addTodo = () => {
                const input = document.getElementById('new-todo');
                const text = input.value.trim();
                if (text) {
                    todos.push({ text, completed: false });
                    input.value = '';
                    render();
                }
            };

            document.getElementById('add-todo').addEventListener('click', addTodo);
        };

        todoApp();
    </script>
</body>
</html>
