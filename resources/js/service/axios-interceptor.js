function setupAxiosInterceptors(store) {
    axios.interceptors.request.use(
        (config) => {
            const passportToken = store.state.VerifyUser.passportToken;           
            if (passportToken) {
                config.headers.Authorization = `Bearer ${passportToken}`;
            }
            return config;
        },
        (error) => {
            return Promise.reject(error);
        }
    );
    axios.interceptors.response.use(
        (response) => {
            return response;
        },
        (error) => {
            return Promise.reject(error);
        }
    );
}

export default setupAxiosInterceptors;
