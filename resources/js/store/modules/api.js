import axios from 'axios';


export default axios.create({
        baseURL: process.env.MIX_APP_API_SERVER_URL+"/api/",
        headers: {
            'Content-Type': 'application/vnd.api+json',
            // Authentication: `Bearer ${token}`,
        },
    })
