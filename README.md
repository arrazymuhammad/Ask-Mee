## About Ask Mee

Ask Mee adalah sebuah final project untuk kelas Laravel yang diadakan oleh Sanbercode batch Juni
Tugas yang diberikan adalah untuk membuat sebuah clone dari web stack overflow menggunakan laravel

Adapun Spesifikasinya adalah Sebagai Berikut
- Pengguna dapat melihat & membuat pertanyaan baru yang terdiri dari: judul, isi pertanyaan, dan tag (memerlukan autentikasi).
- Setiap pertanyaan memiliki penanda waktu (created_at, updated_at).
- Setiap pengguna dapat memberikan jawaban pada sebuah pertanyaan (memerlukan autentikasi).
- Setiap pertanyaan dan jawaban memiliki poin vote yang merepresentasikan tingkat ke-relevan-an sebuah pertanyaan dan penting untuk segera dijawab. 
- Setiap pengguna memiliki poin reputasi yang merepresentasikan tingkat kontribusi dalam forum tanya jawab. 
- Pengguna dapat memberikan komentar pada jawaban atau pertanyaan. (memerlukan autentikasi)
- Pengguna dapat memberikan upvote, satu pengguna hanya boleh memberikan satu upvote. (memerlukan autentikasi).
- Setiap pertanyaan atau jawaban yang di-upvote oleh pengguna lain maka pengguna yang membuat pertanyaan atau jawaban tersebut mendapatkan 10 poin reputasi. 
- Pengguna dapat memberikan downvote, ketika melakukan downvote maka pengguna tersebut dikurangi 1 poin reputasi. 
- Pembuat pertanyaan dapat menandai jawaban yang menurut dia paling tepat menyelesaikan masalahnya. 
- Setiap jawaban yang ditandai sebagai jawaban tepat maka pengguna yang membuat jawaban tersebut mendapatkan tambahan reputasi 15 poin.
- Pengguna yang boleh downvote adalah pengguna dengan reputasi minimal 15 poin
