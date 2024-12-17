// Import axios
import axios from 'axios';

// Membuat instance axios dengan konfigurasi
const Api = axios.create({
  // Samakan dengan URL API Laravel Modul 5
  baseURL: 'http://localhost:8000',
});

// Ekspor instance Api untuk digunakan di tempat lain
export default Api;

// Method untuk membaca semua post
export const getPosts = () => {
  return Api.get('/api/posts');
};

// Method untuk membaca post berdasarkan ID
export const getPost = (id) => {
  return Api.get(`/api/posts/${id}`);
};

// Method untuk membuat post
export const createPost = (formData) => {
  return Api.post('/api/posts', formData);
};

// Method untuk memperbarui post
export const updatePost = (id, formData) => {
  return Api.put(`/api/posts/${id}`, formData);
};

// Method untuk menghapus post
export const deletePost = (id) => {
  return Api.delete(`/api/posts/${id}`);
};
