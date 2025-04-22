## This Project

After learning Laravel the other day, I wanted to give it my own attempt using what I'd learned. This is an app that allows users to track the books they are reading, including the number of pages they've read and the number of pages in the book.

This is the draft of a project, and was created all within the day of 4/21/2025. 
There are plenty of bugs or simple issues - for instance, a user could enter a number of pages larger than the number of pages in the book itself. In that case, it turns red to indicate that the book hasn't been started yet.
There's also a design bug I'm aware of - when testing on a mobile device, there's a few places with text that is cut off and unreadable.

As mentioned above, this is the draft of a project. I may continue the project and resolve these issues later, but for now this serves as a notice for what's been done, and a warning for what's missing.


## Images

This code cannot be run without a few of the key components including the database. Images here display how the code performs on my devices.


### Login Screen

This screen prompts the user to log in. If they have registered already, their username and password will be stripped of malicious input (such as removing html tags) and tested against the password hash in the database. This action is only performed if their username and password were entered. This is the same page where the dashboard exists - the default directory "/". However, the dashboard only displays to authenticated users (those who are logged in). Other users are met with this login screen.
![login-screen_large](https://github.com/user-attachments/assets/d908985a-ecab-4d12-98fa-cd2f411e9334)

An example from a phone-sized window (to showcase consistency in the design with mobile deployment).
![login-screen_small](https://github.com/user-attachments/assets/4d0d60bb-60c5-4ed2-bfdd-a987faf1a293)

---

### Registration screen

This screen prompts the user to create an account. All fields are required, or the page will not allow the user to submit. The username is checked against the databse, and must be a unique name or the user will not be allowed to submit. There are also a few restrictions on the minimum length of the username and password, and the email must be formatted like an email.
![register-screen_large](https://github.com/user-attachments/assets/0fa5a1f0-6b63-4436-9809-60b5ed28a5e7)


Phone-sized window example.
![register-screen_small](https://github.com/user-attachments/assets/3f195946-4a4d-4bc1-a135-32f6fca0905d)

---

### Dashboard (empty)

The dashboard begins empty, with three separate 'blocks' of content. The two on the right are currently unimplemented. The user can interact with "Your Books", however. At the bottom of the screen is a button that reads "Log Out". When clicked, the user is logged out, and then returned to the homepage. As mentioned earlier, this routes them to the unauthorized version of the homepage, which prompts them to log in (or register).
![empty-dashboard_large](https://github.com/user-attachments/assets/872ff099-558f-4776-a158-fa57df011815)

Phone-sized window example.
![empty-dashboard_small](https://github.com/user-attachments/assets/1fab1638-fb61-4063-8913-86818b3f5e78)

---

### Dashboard (populated)

This is what the dashboard looks like when it has been populated with various books.
![full-dashboard_large](https://github.com/user-attachments/assets/4c732ca5-62f1-4d53-91a8-26eb5418f6b4)

Phone-sized window example.
![full-dashboard_small](https://github.com/user-attachments/assets/736f567b-7e41-442a-ae49-beb289a99629)


---

### Uploading a Book

Clicking the link "Add a New Book" leads to this page. The information entered is stored in the mysql database, and will appear in the dashboard.
![upload-book_large](https://github.com/user-attachments/assets/0fdffeb8-b353-445c-ab31-6ad5c424359d)

Phone-sized window example.
![upload-book_small](https://github.com/user-attachments/assets/9f5257ee-029b-4e34-a5cd-3e034b3d4e79)


---

### Updating a Reading

On the dashboard, each book has an "update" button. Clicking that button leads to this page. The fields are pre-populated with information pulled from the database, and upon clicking "Save Changes" the database entry will be updated to reflect the information.
![update-reading_large](https://github.com/user-attachments/assets/ea1f5e35-ccf2-4240-999d-7b2a55fae289)

I'm not including an example of the phone-sized window here. It's the same CSS as the previous examples, including "Uploading a Book" right above.

