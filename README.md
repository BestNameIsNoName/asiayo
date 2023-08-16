# asiayo 考試題目 安裝步驟
1. 下載程式碼。
2. cd到目錄底下後，執行composer install。
3. 執行php artisan serve，取得網址(例：127.0.0.1:8000)。
4. 開啟瀏覽器輸入http://127.0.0.1:8000?source=USD&target=JPY&amount=$1,525，查看回傳的資料。
5. 執行 php artisan test，可執行單元測試。