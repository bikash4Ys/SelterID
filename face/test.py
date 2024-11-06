import dlib
import numpy as np
import cv2
import os
import shutil
import time
import logging
import tkinter as tk
from tkinter import font as tkFont
from PIL import Image, ImageTk

# Initialize dlib's face detector
detector = dlib.get_frontal_face_detector()

class FaceRegisterApp:
    def __init__(self):
        self.face_count = 0           # Number of detected faces in current frame
        self.saved_face_count = 0      # Number of saved face images
        self.screenshot_count = 0      # Number of screenshots taken
        self.face_folder_created = False

        # Create main Tkinter window
        self.win = tk.Tk()
        self.win.title("Face Register")
        self.win.geometry("1000x500")

        # Set up GUI frames
        self.setup_gui()

        # Set up directories
        self.image_dir = "data/data_faces_from_camera/"
        self.setup_directories()

        # Capture video
        self.cap = cv2.VideoCapture(0)  # Capture from default camera

    def setup_gui(self):
        # Left frame for camera feed
        self.camera_frame = tk.Frame(self.win)
        self.camera_label = tk.Label(self.win)
        self.camera_label.pack(side=tk.LEFT)
        self.camera_frame.pack()

        # Right frame for information and controls
        self.info_frame = tk.Frame(self.win)
        tk.Label(self.info_frame, text="Face Register", font=tkFont.Font(family='Helvetica', size=20, weight='bold')).grid(row=0, column=0, columnspan=3, pady=20)
        self.setup_controls()
        self.info_frame.pack()

    def setup_controls(self):
        # Info labels
        self.fps_label = tk.Label(self.info_frame, text="FPS: ")
        self.fps_label.grid(row=1, column=0, sticky=tk.W, padx=5, pady=2)

        self.face_count_label = tk.Label(self.info_frame, text="Faces in current frame: 0")
        self.face_count_label.grid(row=2, column=0, sticky=tk.W, padx=5, pady=2)

        # Input for name and create folder button
        self.name_entry = tk.Entry(self.info_frame)
        self.name_entry.grid(row=3, column=1, sticky=tk.W, padx=5, pady=2)
        tk.Button(self.info_frame, text="Create Folder", command=self.create_face_folder).grid(row=3, column=2, padx=5, pady=5)

        # Save face button
        tk.Button(self.info_frame, text="Save Face", command=self.save_face_image).grid(row=4, column=0, columnspan=3, pady=20)

        # Clear data button
        tk.Button(self.info_frame, text="Clear Data", command=self.clear_data).grid(row=5, column=0, columnspan=3, pady=10)

    def setup_directories(self):
        # Check if image directory exists, if not, create it
        if not os.path.exists(self.image_dir):
            os.makedirs(self.image_dir)

    def clear_data(self):
        # Clear saved images and reset counts
        shutil.rmtree(self.image_dir)
        os.makedirs(self.image_dir)
        self.saved_face_count = 0
        self.face_folder_created = False
        print("All face data cleared.")

    def create_face_folder(self):
        # Create folder for new face images
        name = self.name_entry.get().strip()
        if name:
            folder_name = f"{self.image_dir}/{name}_{self.saved_face_count + 1}"
            os.makedirs(folder_name, exist_ok=True)
            self.current_face_dir = folder_name
            self.saved_face_count += 1
            self.face_folder_created = True
            print(f"Folder created for {name} at {self.current_face_dir}")
        else:
            print("Please enter a valid name.")

    def update_fps(self, start_time):
        # Calculate and display FPS
        end_time = time.time()
        fps = 1 / (end_time - start_time)
        self.fps_label.config(text=f"FPS: {fps:.2f}")
        return time.time()

    def capture_frame(self):
        # Capture and process frame
        ret, frame = self.cap.read()
        if not ret:
            print("Error: Camera not accessible")
            return

        frame = cv2.resize(frame, (640, 480))
        faces = detector(frame, 0)
        self.face_count_label.config(text=f"Faces in current frame: {len(faces)}")

        for face in faces:
            x, y, w, h = face.left(), face.top(), face.width(), face.height()
            cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)

        # Display frame in Tkinter GUI
        self.display_frame(frame)
        self.win.after(20, self.capture_frame)

    def display_frame(self, frame):
        # Convert frame to Tkinter-compatible format
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        img = Image.fromarray(frame_rgb)
        imgtk = ImageTk.PhotoImage(image=img)
        self.camera_label.imgtk = imgtk
        self.camera_label.configure(image=imgtk)

    def save_face_image(self):
        # Save detected face images to the folder
        if not self.face_folder_created:
            print("Please create a folder for the face images first.")
            return

        ret, frame = self.cap.read()
        if ret:
            faces = detector(frame, 0)
            if faces:
                x, y, w, h = faces[0].left(), faces[0].top(), faces[0].width(), faces[0].height()
                face_img = frame[y:y + h, x:x + w]
                face_img_rgb = cv2.cvtColor(face_img, cv2.COLOR_BGR2RGB)
                face_img_pil = Image.fromarray(face_img_rgb)
                face_img_pil.save(f"{self.current_face_dir}/face_{self.screenshot_count}.jpg")
                self.screenshot_count += 1
                print(f"Saved face image {self.screenshot_count} for {self.current_face_dir}")
            else:
                print("No face detected. Please try again.")

    def run(self):
        # Run the Tkinter main loop and start capturing frames
        self.capture_frame()
        self.win.mainloop()

if __name__ == "__main__":
    logging.basicConfig(level=logging.INFO)
    app = FaceRegisterApp()
    app.run()
