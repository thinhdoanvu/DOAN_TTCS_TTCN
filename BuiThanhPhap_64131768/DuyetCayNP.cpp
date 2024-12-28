#include<stdio.h>
#include<graphics.h>
#include<stdlib.h>
#include <time.h>//de su dung rand()
#include <queue>  // Thu vien cho hang doi
//Dinh nghia so luong toi da va ten tap tin dau vao
#define MAX 7
#define INPUT "points.inp"

//khai bao protype cac ham
void inputSize();
void readfile();
void printpoints(struct toado m[MAX], int size);
void GUI_init();
void mouse();
void keyboard();
void demo();
void drawBinaryTree(struct Node* root, int x, int y, int offset, int circleColor, int textColor);
void drawTree();
void postOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int *displayX, int displayY);
void freeTree(struct Node* root);
void reset();
void preOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int* displayX, int displayY);
void demoNLR();
void inOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int* displayX, int displayY);
void demoLNR();
void levelOrderTraversal(struct Node* root, int* step, int* displayX, int displayY);
void demoBFS();
//khai bao bien toan cuc
int sodinh;//so dinh (so phan tu can duyet)
FILE *fp;//con tro tep
char buffer[10];
int enable_click = 1;
int data[7]; // M?ng luu tr? t?i da 7 s? dã nh?p
int size = 0; // S? lu?ng ph?n t? hi?n t?i trong m?ng
void GUI_demo(); //hien thi giao dien demo
void GUI_demoNLR();
void GUI_demoLNR();
void GUI_demoBFS();
struct toado{
	int x;
	int y;
	int value;
};

//cau truc cay nhi phan
struct Node {
    int value;//gia tri nut
    struct Node* left;//con tro toi cay trai
    struct Node* right;//con tro toi cay phai
};
 
 //ham them not nut vao cay nhi phan
struct Node* insertNode(struct Node* root, int value) {
    if (root == NULL) {
        struct Node* newNode = (struct Node*)malloc(sizeof(struct Node));//Tao nut moi
        newNode->value = value;//gan gia tri cho nut moi
        newNode->left = NULL;
        newNode->right = NULL;
        return newNode;
    }
    if (value < root->value) {
        root->left = insertNode(root->left, value);//them vao cay con ben trai
    } else {
        root->right = insertNode(root->right, value);//them vao cay con ben phai
    }
    return root;
}

struct toado td[MAX];//moi td la mot kieu toa do (x,y,value)

void freeTree(struct Node* root) {
    if (root == NULL) return;//Neu nut hien tai la null khong lam gi
    freeTree(root->left);//giai phong cay con ben trai
    freeTree(root->right);//giai phong cay con ben phai
    free(root);
}

//Ham doc lay thong tin cac diem
void readfile(){
	fp=fopen(INPUT,"r");
	if(fp==NULL){
		printf("File not found");
		return;
	}
	//else
	//doc dong dau tien cua tap tin
	fscanf(fp,"%d",&sodinh);
	printf("So phan tu can duyet: %d\n",sodinh);
	//doc lan luot tung phan tu: moi ptu co 3 tham so: toado_x, toado_y, giatri
	for(int i=0; i<sodinh; i++){
		fscanf(fp,"%d %d %d", &td[i].x, &td[i].y, &td[i].value);	
	}
	//in ra cac diem
	printpoints(td,sodinh);
	fclose(fp);
}

void printpoints(struct toado m[MAX], int size){
	for(int i=0; i<size; i++){
		printf("%d %d %d\n", m[i].x, m[i].y, m[i].value);
	}
}

//Ve giao dien
void GUI_init(){
	setcolor(WHITE);
	//main border
	setlinestyle(0, 1, 3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(10, 10, 660, 450);
	//load file button
	rectangle(690, 10, 800, 50);
	settextstyle(2, 0, 7);
	outtextxy(700, 20, "Load file");
	//keyboard button: y=y+60 for top an bottom
	rectangle(690, 70, 800, 110);
	settextstyle(2, 0, 7);
	outtextxy(700, 80, "Keyboard");
	//Demo button: y=y+60 for top an bottom
	rectangle(690, 130, 800, 170);
	settextstyle(2, 0, 7);
	outtextxy(700, 140, "Starting");
	// input size button
    rectangle(690, 190, 800, 230);
    settextstyle(2, 0, 7);
    outtextxy(700, 200, "Input Size");
    // Cac nut duyet khac
    rectangle(20, 510, 80, 470);
    settextstyle(2, 0, 7);
    outtextxy(30, 480, "NLR");
    rectangle(110, 510, 170, 470);
    settextstyle(2, 0, 7);
    outtextxy(120, 480, "LNR");
    rectangle(200, 510, 320, 470);
    settextstyle(2, 0, 7);
    outtextxy(210, 480, "Chieu Rong");
    // Reset button
	rectangle(350, 510, 420, 470);
	settextstyle(2, 0, 7);
	outtextxy(360, 480, "Reset");
	//Dung chuot nhap du lieu
	rectangle(450, 510, 570, 470);
	settextstyle(2, 0, 7);
	outtextxy(460, 480, "Mouse Input"); 
	//Thong tin sinh vien
	settextstyle(2, 0, 7);
	outtextxy(690, 300, "GVHD: Doan Vu Thinh");
	settextstyle(2, 0, 7);
	outtextxy(690, 330, "Ten: Bui Thanh Phap");
	settextstyle(2, 0, 7);
	outtextxy(690, 360, "MSSV: 64131768");
	settextstyle(2, 0, 7);
	outtextxy(690, 390, "Lop: 64.CNTT-3");
	settextstyle(2, 0, 7);
	outtextxy(690, 420, "Demo: Duyet cay LRN");	
}

void GUI_demo(){
	setcolor(WHITE);
	//main border
	setlinestyle(0, 1, 3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(10, 10, 660, 450);
	setcolor(7);
	//load file button
	rectangle(690, 10, 800, 50);
	settextstyle(2, 0, 7);
	outtextxy(700, 20, "Load file");
	//keyboard button: y=y+60 for top an bottom
	rectangle(690, 70, 800, 110);
	settextstyle(2, 0, 7);
	outtextxy(700, 80, "Keyboard");
	//Demo button: y=y+60 for top an bottom
	setcolor(4);
	rectangle(690, 130, 800, 170);
	settextstyle(2, 0, 7);
	outtextxy(700, 140, "Starting");
	// input size button
	setcolor(7);
    rectangle(690, 190, 800, 230);
    settextstyle(2, 0, 7);
    outtextxy(700, 200, "Input Size");
	// Cac nut duyet khac
    rectangle(20, 510, 80, 470);
    settextstyle(2, 0, 7);
    outtextxy(30, 480, "NLR");
    
    rectangle(110, 510, 170, 470);
    settextstyle(2, 0, 7);
    outtextxy(120, 480, "LNR");
    
    rectangle(200, 510, 320, 470);
    settextstyle(2, 0, 7);
    outtextxy(210, 480, "Chieu Rong");
    // Reset button
	rectangle(350, 510, 420, 470);
	settextstyle(2, 0, 7);
	outtextxy(360, 480, "Reset");
	//Dung chuot nhap du lieu
	rectangle(450, 510, 570, 470);
	settextstyle(2, 0, 7);
	outtextxy(460, 480, "Mouse Input"); 

	//Thong tin sinh vien
	settextstyle(2, 0, 7);
	outtextxy(690, 300, "GVHD: Doan Vu Thinh");
	settextstyle(2, 0, 7);
	outtextxy(690, 330, "Ten: Bui Thanh Phap");
	settextstyle(2, 0, 7);
	outtextxy(690, 360, "MSSV: 64131768");
	settextstyle(2, 0, 7);
	outtextxy(690, 390, "Lop: 64.CNTT-3");
	settextstyle(2, 0, 7);
	outtextxy(690, 420, "Demo: Duyet cay LRN");
}

void GUI_demoNLR(){
	setcolor(WHITE);
	//main border
	setlinestyle(0, 1, 3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(10, 10, 660, 450);
	setcolor(7);
	//load file button
	rectangle(690, 10, 800, 50);
	settextstyle(2, 0, 7);
	outtextxy(700, 20, "Load file");
	//keyboard button: y=y+60 for top an bottom
	rectangle(690, 70, 800, 110);
	settextstyle(2, 0, 7);
	outtextxy(700, 80, "Keyboard");
	//Demo button: y=y+60 for top an bottom
	rectangle(690, 130, 800, 170);
	settextstyle(2, 0, 7);
	outtextxy(700, 140, "Starting");
	// input size button
    rectangle(690, 190, 800, 230);
    settextstyle(2, 0, 7);
    outtextxy(700, 200, "Input Size");
	// Cac nut duyet khac
	setcolor(4);
    rectangle(20, 510, 80, 470);
    settextstyle(2, 0, 7);
    outtextxy(30, 480, "NLR");
    
    setcolor(7);
    rectangle(110, 510, 170, 470);
    settextstyle(2, 0, 7);
    outtextxy(120, 480, "LNR");
    
    rectangle(200, 510, 320, 470);
    settextstyle(2, 0, 7);
    outtextxy(210, 480, "Chieu Rong");
    // Reset button
	rectangle(350, 510, 420, 470);
	settextstyle(2, 0, 7);
	outtextxy(360, 480, "Reset");
	//Dung chuot nhap du lieu
	rectangle(450, 510, 570, 470);
	settextstyle(2, 0, 7);
	outtextxy(460, 480, "Mouse Input"); 

	//Thong tin sinh vien
	settextstyle(2, 0, 7);
	outtextxy(690, 300, "GVHD: Doan Vu Thinh");
	settextstyle(2, 0, 7);
	outtextxy(690, 330, "Ten: Bui Thanh Phap");
	settextstyle(2, 0, 7);
	outtextxy(690, 360, "MSSV: 64131768");
	settextstyle(2, 0, 7);
	outtextxy(690, 390, "Lop: 64.CNTT-3");
	settextstyle(2, 0, 7);
	outtextxy(690, 420, "Demo: Duyet cay LRN");
}
void GUI_demoLNR(){
	setcolor(WHITE);
	//main border
	setlinestyle(0, 1, 3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(10, 10, 660, 450);
	setcolor(7);
	//load file button
	rectangle(690, 10, 800, 50);
	settextstyle(2, 0, 7);
	outtextxy(700, 20, "Load file");
	//keyboard button: y=y+60 for top an bottom
	rectangle(690, 70, 800, 110);
	settextstyle(2, 0, 7);
	outtextxy(700, 80, "Keyboard");
	//Demo button: y=y+60 for top an bottom
	rectangle(690, 130, 800, 170);
	settextstyle(2, 0, 7);
	outtextxy(700, 140, "Starting");
	// input size button
    rectangle(690, 190, 800, 230);
    settextstyle(2, 0, 7);
    outtextxy(700, 200, "Input Size");
	// Cac nut duyet khac
    rectangle(20, 510, 80, 470);
    settextstyle(2, 0, 7);
    outtextxy(30, 480, "NLR");
    
    setcolor(4);
    rectangle(110, 510, 170, 470);
    settextstyle(2, 0, 7);
    outtextxy(120, 480, "LNR");
    
	setcolor(7);
    rectangle(200, 510, 320, 470);
    settextstyle(2, 0, 7);
    outtextxy(210, 480, "Chieu Rong");
    // Reset button
	rectangle(350, 510, 420, 470);
	settextstyle(2, 0, 7);
	outtextxy(360, 480, "Reset");
	//Dung chuot nhap du lieu
	rectangle(450, 510, 570, 470);
	settextstyle(2, 0, 7);
	outtextxy(460, 480, "Mouse Input"); 

	//Thong tin sinh vien
	settextstyle(2, 0, 7);
	outtextxy(690, 300, "GVHD: Doan Vu Thinh");
	settextstyle(2, 0, 7);
	outtextxy(690, 330, "Ten: Bui Thanh Phap");
	settextstyle(2, 0, 7);
	outtextxy(690, 360, "MSSV: 64131768");
	settextstyle(2, 0, 7);
	outtextxy(690, 390, "Lop: 64.CNTT-3");
	settextstyle(2, 0, 7);
	outtextxy(690, 420, "Demo: Duyet cay LRN");
}
void GUI_demoBFS(){
	setcolor(WHITE);
	//main border
	setlinestyle(0, 1, 3);//setlinestyle(int linestyle, unsigned pattern, int thickness)
	rectangle(10, 10, 660, 450);
	setcolor(7);
	//load file button
	rectangle(690, 10, 800, 50);
	settextstyle(2, 0, 7);
	outtextxy(700, 20, "Load file");
	//keyboard button: y=y+60 for top an bottom
	rectangle(690, 70, 800, 110);
	settextstyle(2, 0, 7);
	outtextxy(700, 80, "Keyboard");
	//Demo button: y=y+60 for top an bottom
	rectangle(690, 130, 800, 170);
	settextstyle(2, 0, 7);
	outtextxy(700, 140, "Starting");
	// input size button
    rectangle(690, 190, 800, 230);
    settextstyle(2, 0, 7);
    outtextxy(700, 200, "Input Size");
	// Cac nut duyet khac
    rectangle(20, 510, 80, 470);
    settextstyle(2, 0, 7);
    outtextxy(30, 480, "NLR");
    
    rectangle(110, 510, 170, 470);
    settextstyle(2, 0, 7);
    outtextxy(120, 480, "LNR");
    
    setcolor(4);
    rectangle(200, 510, 320, 470);
    settextstyle(2, 0, 7);
    outtextxy(210, 480, "Chieu Rong");
    // Reset button
    setcolor(7);
	rectangle(350, 510, 420, 470);
	settextstyle(2, 0, 7);
	outtextxy(360, 480, "Reset");
	//Dung chuot nhap du lieu
	rectangle(450, 510, 570, 470);
	settextstyle(2, 0, 7);
	outtextxy(460, 480, "Mouse Input"); 

	//Thong tin sinh vien
	settextstyle(2, 0, 7);
	outtextxy(690, 300, "GVHD: Doan Vu Thinh");
	settextstyle(2, 0, 7);
	outtextxy(690, 330, "Ten: Bui Thanh Phap");
	settextstyle(2, 0, 7);
	outtextxy(690, 360, "MSSV: 64131768");
	settextstyle(2, 0, 7);
	outtextxy(690, 390, "Lop: 64.CNTT-3");
	settextstyle(2, 0, 7);
	outtextxy(690, 420, "Demo: Duyet cay LRN");
}

// Ham xu ly so luong va nhap gia tri tu ban phim
void inputSize() {
    printf("\nNhap so luong phan tu (toi da %d): ", MAX);
    scanf("%d", &sodinh);
    
    if (sodinh > MAX) {
        printf("So phan tu vuot qua gioi han cho phep. So phan tu toi da là %d\n", MAX);
        sodinh = MAX; 
    }
    
    srand(time(NULL));  
    for (int i = 0; i < sodinh; i++) {
        printf("Nhap gia tri cho phan tu thu %d: ", i + 1);
        scanf("%d", &td[i].value);
        td[i].x = rand() % 640 + 10;  
        td[i].y = rand() % 460 + 10;  
    }
    printf("\nNhap xong danh sach phan tu!\n");
    printpoints(td, sodinh); 
}

//ham kiem tra su kien chuot
void mouse() {
    int x_mouse, y_mouse;
    int enteredNumbers = 0; // Bien dem so luong so da nhap
    while (enable_click) {
        // Check for left mouse click event
        if (ismouseclick(WM_LBUTTONDOWN)) {
            // Get mouse position
            getmouseclick(WM_LBUTTONDOWN, x_mouse, y_mouse);
            // Print x, y position to console
            printf("Mouse clicked at (%d, %d)\n", x_mouse, y_mouse);
            // Checking for Load file button
            if (x_mouse > 690 && x_mouse < 800 && y_mouse > 10 && y_mouse < 50) {
                printf("Read from file...\n");
                readfile();
                drawTree();
            }
            // Checking for Keyboard button
            if (x_mouse > 690 && x_mouse < 800 && y_mouse > 70 && y_mouse < 110) {
                printf("Input from keyboard...\n");
                keyboard();
                drawTree();
            }
            // Checking for Starting button
            if (x_mouse > 690 && x_mouse < 800 && y_mouse > 130 && y_mouse < 170) {
                printf("Running demonstration...\n");
                demo();
            }
            // Checking for Input Size button
            if (x_mouse > 690 && x_mouse < 800 && y_mouse > 190 && y_mouse < 230) {
                printf("Input size from keyboard...\n");
                inputSize();
                drawTree();
            }
            // Checking for NLR button
            if (x_mouse > 20 && x_mouse < 80 && y_mouse > 470 && y_mouse < 510) {
                printf("NLR traversal...\n");
                demoNLR();
            }
            // Checking for LNR button
            if (x_mouse > 110 && x_mouse < 170 && y_mouse > 470 && y_mouse < 510) {
                printf("LNR traversal...\n");
                demoLNR();
            }
            // Checking for Breadth-First Search (Chieu Rong) button
            if (x_mouse > 200 && x_mouse < 320 && y_mouse > 470 && y_mouse < 510) {
                printf("Breadth-First Search (Chieu Rong) traversal...\n");
                demoBFS();
            }
            // Checking for Reset button
            if (x_mouse > 350 && x_mouse < 420 && y_mouse > 470 && y_mouse < 510) {
                printf("Resetting...\n");
				reset();
            }
            // Kiem tra nut "Mouse Input"
            if (x_mouse > 450 && x_mouse < 570 && y_mouse > 470 && y_mouse < 510) {
                printf("Mouse Input button clicked!\n");

                // Che do nhap du lieu bang chuot
                printf("Click to input a number (0-9):\n");

                // Can giua cac o so tu 0 den 9
                int startX = 150;  // Vi tri bat dau cua bang so (can giua man hinh)
                int y_pos = 300;   // Toa do Y co dinh cua cac o so

                // Ve cac o so tu 0 den 9
                for (int i = 0; i < 10; i++) {
                    int x_pos = startX + i * 40;  // Toa do X cua cac o so tu 0 den 9
                    rectangle(x_pos, y_pos, x_pos + 40, y_pos + 40);
                    char buffer[2];
                    sprintf(buffer, "%d", i);
                    outtextxy(x_pos + 15, y_pos + 15, buffer);
                }

                // Cho nguoi dung nhap vao cac o so da nhap
                while (enteredNumbers < 7) {  // Dung lai khi da nhap du 7 so
                    if (ismouseclick(WM_LBUTTONDOWN)) {
                        getmouseclick(WM_LBUTTONDOWN, x_mouse, y_mouse);
                        for (int i = 0; i < 10; i++) {
                            int x_pos = startX + i * 40;  // Toa do X cua cac o so tu 0 den 9
                            int y_pos = 300;              // Toa do Y co dinh cua cac o so

                            // Kiem tra neu chuot nhap vao o so
                            if (x_mouse >= x_pos && x_mouse <= x_pos + 40 &&
                                y_mouse >= y_pos && y_mouse <= y_pos + 40) {
                                printf("Number %d selected!\n", i);
                                
                                // Them so vao cay nhi phan
                                td[sodinh++].value = i;
                                printf("Added number %d to tree\n", i);
                                
                                // Ve lai cay sau khi them so
                                drawTree();
                                
                                // Cap nhat so luong so da nhap
                                enteredNumbers++;

                                // Xoa hoac lam mo o so da chon
                                setfillstyle(SOLID_FILL, BLACK);  // To mau den (hoac mau khac) cho o so da chon
                                floodfill(x_pos + 20, y_pos + 20, WHITE); // Lam mo o so da chon

                                // Neu da nhap du 7 so, an bang so va quay lai giao dien chinh
                                if (enteredNumbers >= 7) {
                                    // Xoa cac o so khoi man hinh
                                    cleardevice();
                                    // Ve lai cay voi cac so da nhap
                                    drawTree();
                                    GUI_init();
                                    break;  // Thoat khoi vong lap nhap so
                                }
                                break;  // Thoat vong lap kiem tra o so
                            }
                        }
                    }
                    delay(100);
                }
            } 
        }
        // Check for right mouse click to exit loop
        if (ismouseclick(WM_RBUTTONDOWN)) {
            // Get mouse position
            getmouseclick(WM_RBUTTONDOWN, x_mouse, y_mouse);
            // Print exit message to console
            printf("Right mouse click detected. Exiting...\n");
            break;
        }
        delay(100); // Wait for the next mouse event cycle
    }
}
//ham nhap tu ban phim
void keyboard(){
	fp=fopen(INPUT,"r");
	if(fp==NULL){
		printf("File not found");
		return;
	}
	//else
	//doc dong dau tien cua tap tin
	fscanf(fp,"%d",&sodinh);

	//doc lan luot tung phan tu: moi ptu co 2 tham so: toado_x, toado_y
	for(int i=0; i<sodinh; i++){
		fscanf(fp,"%d %d %d", &td[i].x, &td[i].y, &td[i].value);	
		//nhap gia tri cho cac diem
		printf("\ntd[%d].value = ",i);
		scanf("%d",&td[i].value);
	}
	//in ra cac diem
	printpoints(td,sodinh);
	printf("\nFinished!");
	fclose(fp);
}
//ham ve cay nhi phan
void drawBinaryTree(struct Node* root, int x, int y, int offset, int circleColor, int textColor) {
    if (root == NULL) return;
    setcolor(circleColor);
    circle(x, y, 25);  
    setcolor(textColor); 
    settextstyle(1, 0, 1); 
    outtextxy(x - 10, y - 10, itoa(root->value, buffer, 10));  
    delay(500);
    if (root->left != NULL) {
        setcolor(circleColor);
        line(x, y + 25, x - offset + 10, y + 35); 
        drawBinaryTree(root->left, x - offset, y + 60, offset / 2, circleColor, textColor);
    }
    if (root->right != NULL) {
        setcolor(circleColor);
        line(x, y + 25, x + offset - 10, y + 35); 
        drawBinaryTree(root->right, x + offset, y + 60, offset / 2, circleColor, textColor);
    }
}
//ham ve cay nhi phan tu cac gia tri da nhap vao
void drawTree() {
    struct Node* root = NULL;//khoi tao cay rong
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value);
    }
    drawBinaryTree(root, getmaxx() / 3, 50, 90, BLUE, YELLOW);//getmax() lay chieu rong man hinh
}

//Ham duyet cay theo thu tu sau va cac buoc
void postOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int *displayX, int displayY) {
    if (root == NULL) return;
    // Duyet cay con ben trai
    if (root->left != NULL) {
        postOrderTraversal(root->left, x - offset, y + 60, offset / 2, step, displayX, displayY);
    }
    // Duyet cay con ben phai
    if (root->right != NULL) {
        postOrderTraversal(root->right, x + offset, y + 60, offset / 2, step, displayX, displayY);
    }
    // Hien thi vong tron tai vi tri hien tai
    if (*step % 2 == 0) {
        setcolor(6);  
    } else {
        setcolor(3);  
    }
    circle(x, y, 25);
    settextstyle(1, 0, 1);
    outtextxy(x - 10, y - 10, itoa(root->value, buffer, 10));
    // Hien thi buoc trên console
    printf("\nBuoc %d: Duyet nut %d\n", ++(*step), root->value);
    // Hien thi ket qua tai vung danh sach LRN
    if (*step % 2 == 0) {
        setcolor(3);  
    } else {
        setcolor(6);  
    }
    circle(*displayX, displayY, 25);
    outtextxy(*displayX - 7, displayY - 7, itoa(root->value, buffer, 10));  
    *displayX += 70; 
    delay(1000);
    mouse();
}

void demo() {
    enable_click = 0; 
    GUI_demo();

    struct Node* root = NULL;
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value);
    }

    int displayX = 120; 
    int displayY = 380; 
    int step = 0;      
    printf("Post-order traversal (LRN): ");
    postOrderTraversal(root, getmaxx() / 3, 50, 90, &step, &displayX, displayY);
    printf("\n");
    delay(1000);
    enable_click = 1;
    mouse(); 
}

// Ham duyet cay theo thu tu truoc va cac buoc
void preOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int* displayX, int displayY) {
    if (root == NULL) return;
    // Duyet nut goc (root) truoc
        if (*step % 2 == 0) {
        setcolor(12);  
    } else {
        setcolor(10);  
    }
    circle(x, y, 25);
    settextstyle(1, 0, 1);
    outtextxy(x - 10, y - 10, itoa(root->value, buffer, 10));
    // Hien thi buoc tren console
    printf("\nBuoc %d: Duyet nut %d\n", ++(*step), root->value);
    // Hien thi ket qua tai vung danh sach NLR
    if (*step % 2 == 0) {
        setcolor(10);  
    } else {
        setcolor(12); 
    }
    circle(*displayX, displayY, 25);
    outtextxy(*displayX - 7, displayY - 7, itoa(root->value, buffer, 10));  
    *displayX += 70; 
    delay(1000);
    // Duyet cay con ben trai
    if (root->left != NULL) {
        preOrderTraversal(root->left, x - offset, y + 60, offset / 2, step, displayX, displayY);
    }
    // Duyet cay con ben phai
    if (root->right != NULL) {
        preOrderTraversal(root->right, x + offset, y + 60, offset / 2, step, displayX, displayY);
    }
}

// Ham demo de duyet theo thu tu truoc
void demoNLR() { 
    enable_click = 0; 
    GUI_demoNLR();

    struct Node* root = NULL;
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value);
    }

    int displayX = 120; 
    int displayY = 380; 
    int step = 0;      
    printf("Duyet cay theo thu tu truoc (NLR): ");
    preOrderTraversal(root, getmaxx() / 3, 50, 90, &step, &displayX, displayY);
    printf("\n");
    delay(1000);
    enable_click = 1;
    mouse(); 
}

// Ham duyet cay theo thu tu giua va cac buoc
void inOrderTraversal(struct Node* root, int x, int y, int offset, int* step, int* displayX, int displayY) {
    if (root == NULL) return;
    // Duyet cay con ben trai
    if (root->left != NULL) {
        inOrderTraversal(root->left, x - offset, y + 60, offset / 2, step, displayX, displayY);
    }
    if (*step % 2 == 0) {
        setcolor(YELLOW);  
    } else {
        setcolor(GREEN);  
    }
    // Duyet nut goc (root) giua
    circle(x, y, 25);
    settextstyle(1, 0, 1);
    outtextxy(x - 10, y - 10, itoa(root->value, buffer, 10));
    // Hien thi buoc tren console
    printf("\nBuoc %d: Duyet nut %d\n", ++(*step), root->value);
    if (*step % 2 == 0) {
        setcolor(GREEN);  
    } else {
        setcolor(YELLOW); 
    }
    circle(*displayX, displayY, 25);  
    outtextxy(*displayX - 7, displayY - 7, itoa(root->value, buffer, 10));  
    *displayX += 70; 
    delay(1000);
    // Duyet cay con ben phai
    if (root->right != NULL) {
        inOrderTraversal(root->right, x + offset, y + 60, offset / 2, step, displayX, displayY);
    }
}
// Ham demo de duyet theo thu tu giua (LNR)
void demoLNR() {  
    enable_click = 0; 
    GUI_demoLNR();
    struct Node* root = NULL;
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value);
    }
    int displayX = 120; 
    int displayY = 380; 
    int step = 0;      
    printf("Duyet cay theo thu tu giua (LNR): ");
    inOrderTraversal(root, getmaxx() / 3, 50, 90, &step, &displayX, displayY);
    printf("\n");
    delay(1000);
    enable_click = 1;
    mouse(); 
}

// Ham reset
void reset() {
    cleardevice();
    GUI_init();
    struct Node* root = NULL;
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value); 
    }
    drawBinaryTree(root, getmaxx() / 3, 50, 90, BLUE, YELLOW);
    printf("Giao dien va cay da duoc lam moi.\n");
    enable_click = 1;
    mouse(); 
}

// Ham duyet cay theo chieu rong
void levelOrderTraversal(struct Node* root, int* step, int* displayX, int displayY) {
    if (root == NULL) return;
    // Khoi tao hang doi
    std::queue<struct Node*> q;
    q.push(root);
    // Duyet cay theo chieu rong
    while (!q.empty()) {
        struct Node* current = q.front();
        q.pop();
        if (*step % 2 == 0) {
            setcolor(CYAN);  // Mau do cho cac buoc chan
        } else {
            setcolor(MAGENTA);  // Mau xanh cho cac buoc le
        }
        // Hien thi nut hien tai
        circle(*displayX, displayY, 25); 
        settextstyle(1, 0, 1);
        outtextxy(*displayX - 7, displayY - 7, itoa(current->value, buffer, 10)); 
        *displayX += 70;
        // Hien thi buoc trên console
        printf("\nBuoc %d: Duyet nut %d\n", ++(*step), current->value);
        // Duyet cac nut con
        if (current->left != NULL) {
            q.push(current->left);
        }
        if (current->right != NULL) {
            q.push(current->right);
        }
        delay(1000);
    }
}

// Ham demo de duyet theo chieu rong
void demoBFS() {
    enable_click = 0;
    GUI_demoBFS();
    struct Node* root = NULL;
    for (int i = 0; i < sodinh; i++) {
        root = insertNode(root, td[i].value);
    }
    int displayX = 120;
    int displayY = 380;
    int step = 0;
    printf("Duyet cay theo chieu rong (BFS): ");
    levelOrderTraversal(root, &step, &displayX, displayY);
    printf("\n");
    delay(1000);
    enable_click = 1;
    mouse(); 
}

//chuong trinh chinh
int main(){
	initwindow(900,550);//width=900px, height=550px
	GUI_init();
	//dung chuot
	mouse();
	//man hinh
	getch();
	return 0;
} 
