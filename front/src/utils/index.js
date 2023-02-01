import AxiosInstance from "./api";

// export const api = AxiosInstance.getInstance('http://localhost/api'); //for docker
export const api = AxiosInstance.getInstance('http://news-server.test/api');

export const slugify = (str) => {
    return str
        .toLowerCase()
        .replace(/ /g, '-')
        .replace(/[^\w-]+/g, '');
};

export const formatDate = (date) => {
    const d = new Date(date);
    const year = d.getFullYear();
    if(!year) return '';
    const month = `0${d.getMonth() + 1}`.slice(-2);
    const _date = `0${d.getDate()}`.slice(-2);
    return `${year}-${month}-${_date}`;
};

export const comparable = data => JSON.stringify(data);

export const capitalize = str => str.charAt(0).toUpperCase() + str.slice(1);