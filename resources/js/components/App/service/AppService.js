import axios from "axios";


export const AppService = {

    getProperty: async (propertyId) => {

        return await axios.get(`/cactus-server/public/api/todoList/${propertyId}`);
    },

    createShore: async ({name, description, date}, propertyId) => {

        const form = new FormData();
        form.append('name', name);
        form.append('description', description);
        form.append('date', date);

        return await axios.post(`/cactus-server/public/api/todoList/${propertyId}`, form);
    },

};