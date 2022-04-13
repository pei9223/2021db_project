# 交大學餐營養管理系統
**2021 Database final project**

整合交大校園內學餐營業時間、品項營養成分、熱量等資訊，根據使用者需求推薦餐點，解決每日煩惱三餐的困擾。
同時建立使用者資料庫，透過註冊帳號及資料，記錄個人飲食記錄。統計使用者每日攝取的營養成分，給予建議的運動項目，幫助師生控管飲食及健康。

---
## Spotlight Video

[![IMAGE ALT TEXT](http://img.youtube.com/vi/ucm_6d0FIS4/0.jpg)](https://www.youtube.com/watch?v=ucm_6d0FIS4 "Spotlight Video")
---

## Application
### Interface of our application
![](https://i.imgur.com/jGAWhWF.png)
### Functions of our application
**1. 登入/註冊頁面：**
* 此頁面會要求使用者輸入帳號及密碼，若帳號跟密碼輸入正確，將前往主頁面。
* 若輸入錯誤，則會顯示"帳號/密碼錯誤"。

**2. 註冊頁面：**
* 此頁面會要求使用者輸入帳號、密碼、名字、身高、體重。
* 設有防呆機制，若少輸入任一項資料、資料不符合格式、或是輸入了一個已註冊的帳號，則會出現對應的的提醒。
* 在成功註冊後，會導往主頁面。

**3. 主頁面：**
* 主頁面會透過使用者的體重，計算出使用者**一天建議攝取的熱量**，及**今天已攝取的熱量**，並顯示過往的**飲食紀錄**。
* 透過輸入指定日期，使用者可查詢特定日期所攝取的總熱量。
* 按下"登出帳號"，可回到登入/註冊頁面。
* 主頁面上方有我們的四大主要功能:**修改資料、推薦餐點、紀錄飲食、運動身體好**，按下任一功能便會跳往特定頁面。

**4. 修改資料頁面：**
* 此頁面將提供更改使用者資料的功能。使用者必須輸入帳號(帳號不可修改)，使用者可自由選擇是否填寫新密碼、新名字、新身高、新體重。
* 若輸入格式/內容不符，則會出現對應提醒。

![8gxim-40cmh](https://user-images.githubusercontent.com/71477465/163204402-e1edf6be-b3d4-4e9e-80e2-4c9898b5b345.gif)


**5. 推薦餐廳頁面：**
* 透過三種問題選擇，推薦使用者最適合的餐點排序，分別為：
    **1. 你想吃哪間學餐？**（女二、研三、二餐）。
    **2. 你想吃哪種類型？**（正餐、飲料/點心、早餐）。
    **3. 排序依據？**（價錢低到高、熱量低到高、依熱門程度）。
* 另外會根據使用者此刻查詢的時間，列出此時正在營業的店家，若是此時皆無店家營業，我們將顯示"抱歉，目前時間沒有可供應的餐點"。
* 若使用者查詢餐點完畢，則可按下"回首頁"，回到主頁面。

![w877c-osqf1](https://user-images.githubusercontent.com/71477465/163204468-0331df05-c3d2-42d1-a2d5-36e72acdfced.gif)


**6. 記錄飲食頁面：**
* 此頁面提供使用者記錄飲食。
* 在選擇完餐廳後，將列出該餐廳所有的商品、售價、熱量，使用者在餐點下方按下新增，就會將該品項添加到飲食紀錄中。

**7. 運動身體好頁面：**
* 此頁面將根據使用者今天攝取的熱量，顯示建議的運動時間。
* 使用者在選擇運動後，將會顯示若是從事該運動，必須持續運動幾個小時，才能消耗對應的熱量。


---
## Data
### Data Source
* 各餐廳品項資料：
    國立陽明交大餐廳營養分析表
    https://www.ga.nctu.edu.tw/general-division/rest/c-5Njh/g-1?fbclid=IwAR3r5uhtZhqKuAVFKHUEmMeB8wUh0QHyWEpm83xjcoMc8XinOFto4SBSjdk
* 各餐廳營業時間資料：
    國立陽明交通大學各餐廳營業時間表
https://www.ga.nctu.edu.tw/general-division/rest/v-TmrI
* 運動消耗卡路里資料表：
    衛生福利部國民健康署
    https://www.hpa.gov.tw/Pages/Detail.aspx?nodeid=571&pid=9738&fbclid=IwAR18CmmzxVKvd77PrhkZFdz37agEJ1kIXW16m3V3OlP_K1jGDMsp67rd-Lo
## Database
### ER model of schema
![](https://i.imgur.com/UGmK8kO.png)
### Tables
* **各餐廳品項(共20個)：**
    columns: 名稱/ 售價/ 一份(g)/ 蛋白質(g)/ 脂肪(g)/ 醣類(g)/ 熱量(大卡)
* **user_eat：** 紀錄各品項被消費的次數，以依熱門程度推薦菜單
* **user_info：** 紀錄每個註冊的使用者的資料，包括帳號/密碼/名字/身高/體重
* **營業時間：** 紀錄各餐廳的營業時間，以在使用者查詢時，提供有營業的餐廳結果
* **消耗熱量：** 記錄各項運消耗熱量，利用熱量換算並推薦使用者適合的運動
### Connection Between Database and Our Application
![](https://i.imgur.com/w7ZL8rh.png)
* 使用php獲取user request，並抓取資料庫中的data，再透過html將結果呈現於網頁上。
* 使用XAMPP作為網頁伺服器架站的工具，安裝連線後，將php檔放進相應的根目錄中後，就能在本機進行測試和操作。

