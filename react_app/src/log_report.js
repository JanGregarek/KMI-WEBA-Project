import { useState, useEffect } from "react";

export function Counter({ count, setCount, max }) {
    return (
        <div className="card p-3 mb-3 text-center">
            <p className="fw-bold mb-2">Count:</p>

            <div className="d-flex justify-content-center align-items-center gap-3">
                <button
                    className="btn btn-success"
                    onClick={() => setCount(c => c + 1)}
                    disabled={count >= max}
                >
                    +
                </button>

                <p className="fs-4 mb-0">{count}</p>

                <button
                    className="btn btn-danger"
                    onClick={() => setCount(c => c - 1)}
                    disabled={count <= 0}
                >
                    -
                </button>
            </div>
        </div>
    );
}

export function LogReport() {
    const [count, setCount] = useState(() => {
        const saved = localStorage.getItem("count");
        return saved ? Number(saved) : 0;
    });

    const [users, setUsers] = useState([]);

    useEffect(() => {
        fetch("http://localhost/KMI-WEBA-PROJECT/logged")
            .then(r => r.json())
            .then(data => {
                setUsers(data);
                setCount(c => Math.min(c, data.length));
            })
            .catch(console.error);
    }, []);

    useEffect(() => {
        localStorage.setItem("count", count);
    }, [count]);

    function deleteUser(timestamp) {
        setUsers(prev => prev.filter(u => u.timestamp !== timestamp));
        setCount(c => Math.max(0, c - 1));
    }


    return (
        <div className="container mt-4">
            <h3 className="mb-3">Logged users</h3>

            <Counter count={count} setCount={setCount} max={users.length} />

            <ul className="list-group mt-3">
                {users.slice(0, count).map((user) => (
                    <li
                        key={user.timestamp}
                        className="list-group-item d-flex justify-content-between align-items-center"
                    >
                        <span className="fw-semibold">
                            {user.timestamp}
                        </span>
                        <span className="fw-semibold">
                            {user.email}
                        </span>

                        <button
                            className="btn btn-sm btn-outline-danger"
                            onClick={() => deleteUser(user.timestamp)}
                        >
                            Delete
                        </button>
                    </li>
                ))}
            </ul>
        </div>
    );
}
