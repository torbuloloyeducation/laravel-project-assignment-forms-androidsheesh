# Task 1: 

Understand the FlowTrace how the form works:
User enters email
Form submits via POST
Email is stored in session
Page reloads and displays saved emails
Write a short explanation (3–5 sentences) of this flow.

The form indicates that the user will input an email address and submit it VIA POST it means that the one you input will be sent to the server preventing data from appearing in the URL. And, Inputted emails are stored in session as we can see in the "routes/web.php" specifically, the function get /formtest this tells us that the web application temporarily save user's email for the duration of the visit. Lastly, it will redirect to the formtest via POST function. 

# Reflection Questions 

# 1. What is the difference between GET and POST?

The difference of GET and POST is how they handle data.
GET is used to retrieve/fetch data from the server example in this activity in Route::get('/formtest')....All of the inputted emails are display via code "return view('formtest', [
        'emails' => $emails,
    ]);" because all of the entered emails are stored  in email session.
On the other hand, POST is used to send or store data on the server.
In this activity, Route::post('/formtest')..... is responsible for receiving the user’s input (email), validating it, and then saving it into the session.

# 2. Why do we use @csrf in forms?

@csrf or Cross-Site Request Forgery helps our application from CSRF Attacks: tricking authenticated users into performing unwanted actions (e.g., changing passwords, making purchases) by validating the token on the server side.
Because without this a malicious website can trigger HTTP requests from a user's browser to your application, exploiting the user's active session cookie to take actions without their knowledge or consent.

# 3. What is session used for in this activity?

In this activity, a session is used to temporarily store the list of emails entered by the user.

Instead of saving the emails in a database, Laravel stores them in the session so they can still be accessed across different requests (such as when refreshing the page or submitting the form). The emails are retrieved from the session and passed to the view to be displayed.

The session is also used to store temporary messages like success and error notifications (flash messages), which are shown to the user after actions like adding or deleting an email.

# 4. What happens is session is cleared?

If the session is cleared, all the stored data in the session will be removed. In this activity, it means that all saved emails will be deleted and the list will become empty. Any flash messages (like success or error messages) will also disappear.