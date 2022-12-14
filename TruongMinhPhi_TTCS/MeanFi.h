//-- Thu vien chuan C++
#include <iostream>
//-- Thu vien do hoa
#include<graphics.h>
//-- Thu vien de su dung thuat toan hang doi
#include<queue>
//-- Thu vien de su dung ham exit(0)
#include<stdlib.h>
//-- Khong gian ten dung de luu tru
using namespace std;

#define MAX 50

int tmp, tmp1;
int dl = 400;
int continuee1 = 1;
//-----------------------------------------------

//-- Mo phong tao cay
void DoHoaMoPhongVeCay() //-- 5 7 2 3 1 6 8
{
	setlinestyle(3,1,3);
	setcolor(8);
	
	//---- node goc (5)
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); //-- giam x 15, giam y 17
	circle(450,70,25);
	
	
	//-- Tu (5) ve 2 ham line()	----------------------------------------------




	//--- Node cha (7)
	
	delay(dl);
	line(467,87,583,153); //-- tang x1,y1 17, giam x2,y2 di 17
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(585,153,"7");
	circle(600,170,25);
	
	//--- Tu (7) ve 2 ham line() -----------------------------------
	
	
	
	
	//-- node cha (2)
	delay(dl);
	line(433,87,317,153); //-- giam x1,y2 17, tang y1,x2 17
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);
	
	//-- Tu (2) ve 2 ham line() ------------------------------
	
	
	
	//-- Node la (3)
	delay(dl);
	line(317,187,383,253); //-- tang x1,y1 di 17, giam x2,y2 17
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); //-- Giam x 15, giam y 17 
	circle(400,270,25);
	
	
	
	
	//-- Node la (1)
	delay(dl);
	line(283,187,217,253); //-- Giam x1,y2,x2 di 17, tang y1 17
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); //-- Giam x 15, giam y 17 
	circle(200,270,25);
	

		
	
	
	//-- Node la (6)
	delay(dl);
	line(583,187,517,253); //-- tang y1, giam x1,x2,y2
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- Giam x 15, giam y 17
	circle(500,270,25);
	
	
	
	
	
	//-- Node la (8)
	delay(dl);
	line(617,187,683,253);
	delay(dl);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); //-- Giam x 15, giam y 17
	circle(700,270,25);
	
}
//--------------------------------------------------------------
void TatDen()
{
	delay(dl);
	
	//-- tat den 1 ----------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); //-- Giam x 15, giam y 17 
	circle(200,270,25);
	
	//-- tat den 2 -------------------------------------------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);	
	
	//--- tat den 3 -------------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); //-- Giam x 15, giam y 17 
	circle(400,270,25);
	
	//-- Tat den 5 ---------------------------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); // giam x 15, giam y 17
	circle(450,70,25);
		
	//---- tat den 6 -----------------------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- Giam x 15, giam y 17
	circle(500,270,25);
	
	//--- Tat den 7 ---------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(585,153,"7"); //-- Gian x 15, giam y 17
	circle(600,170,25);	
		
	//--- tat den 8 --------------------
	setcolor(8);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); //-- Giam x 15, giam y 17
	circle(700,270,25);			
}
//------ Ham an den CHIEU RONG -------------
void AnDenRong()
{
	setcolor(0);
	
	//--- an den 5 ----------------------
	settextstyle(1,0,3);
	outtextxy(225,378,"5"); //-- Giam x 10, giam y 12
	circle(235,390,20);
	
	
	//--- an den 2 ---------------------------
	settextstyle(1,0,3);
	outtextxy(325,378,"2"); //-- Giam x 10, giam y 12
	circle(335,390,20);
	
	
	//--- an den 7 ----------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(425,378,"7"); //-- Giam x 10, giam y 12
	circle(435,390,20);
	
	
	//-- an den 1 ----------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(525,378,"1"); //-- Giam x 10, giam y 12
	circle(535,390,20);

	
	//-- an den 3 ------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(625,378,"3"); //-- Giam x 10, giam y 12
	circle(635,390,20);
	
	
	//--- an den 6 -----------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(725,378,"6"); //-- Giam x 10, giam y 12
	circle(735,390,20);
	
	
	//--- an den 8 ----------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(825,378,"8"); //-- Giam x 10, giam y 12
	circle(835,390,20);
}
//--- Ham an den NLR -----------------
void AnDenNLR()
{
	setcolor(0);
	//-- an den 5 ---------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(225,448,"5"); //-- Giam x 10, giam y 12
	circle(235,460,20);
	
	
	//-- an den 2 -----------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(325,448,"2"); //-- Giam x 10, giam y 12
	circle(335,460,20);
	
	
	//--- an den 1 -----------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(425,448,"1"); //-- Giam x 10, giam y 12
	circle(435,460,20);
	

	//-- an den 3 -------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(525,448,"3"); //-- Giam x 10, giam y 12
	circle(535,460,20);
	

	//---- an den 7 --------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(625,448,"7"); //-- Giam x 10, giam y 12
	circle(635,460,20);
	
	
	//--- an den 6 ----------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(725,448,"6"); //-- Giam x 10, giam y 12
	circle(735,460,20);
	

	//-- an den 8 -----------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(825,448,"8"); //-- Giam x 10, giam y 12
	circle(835,460,20);
}

//--- Ham an den LNR -----------------
void AnDenLNR()
{
	setcolor(0);
	//--- an den 1 -----------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(225,518,"1"); //-- Giam x 10, giam y 12
	circle(235,530,20);
	

	//-- an den 2 -------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(325,518,"2"); //-- Giam x 10, giam y 12
	circle(335,530,20);
	
	
	//---- an den 3 -------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(425,518,"3"); //-- Giam x 10, giam y 12
	circle(435,530,20);
	
	
	//--- an den 5 -------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(525,518,"5"); //-- Giam x 10, giam y 12
	circle(535,530,20);
	
	
	//-- an den 6 -------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(625,518,"6"); //-- Giam x 10, giam y 12
	circle(635,530,20);
	
	
	//-- an den 7 ---------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(725,518,"7"); //-- Giam x 10, giam y 12
	circle(735,530,20);
	
	
	//-- an den 8 ----------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(825,518,"8"); //-- Giam x 10, giam y 12
	circle(835,530,20);	
}

//--- Ham an den LRN -----------------
void AnDenLRN()
{
	setcolor(0);
	//-- an den 1 ------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(225,588,"1"); //-- Giam x 10, giam y 12
	circle(235,600,20);
	

	//-- an den 3 -------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(325,588,"3"); //-- Giam x 10, giam y 12
	circle(335,600,20);
	
	
	//-- an den 2 --------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(425,588,"2"); //-- Giam x 10, giam y 12
	circle(435,600,20);
	
	
	//--- an den 6 --------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(525,588,"6"); //-- Giam x 10, giam y 12
	circle(535,600,20);
	
	
	//-- an den 7 ------------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(625,588,"7"); //-- Giam x 10, giam y 12
	circle(635,600,20);
	
	
	//-- an den 8 ----------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(725,588,"8"); //-- Giam x 10, giam y 12
	circle(735,600,20);
		
	
	//-- an den 5 -----------------------------------------------------------------------------------
	settextstyle(1,0,3);
	outtextxy(825,588,"5"); //-- Giam x 10, giam y 12
	circle(835,600,20);
}

//----------------------------------------------------------------
void BatDenVaInRong()
{
	//-- Duyet cay theo chieu rong
	delay(dl); 
	setcolor(3);
	settextstyle(0,0,2);
	outtextxy(15,380,"Chieu Rong:");
	rectangle(8,370,195,410);
	//-------------------------------------------------------------------
	
	//-- bat den 5 ------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); // giam x 15, giam y 17
	circle(450,70,25);
	
	//--- in 5 ----------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(225,378,"5"); //-- Giam x 10, giam y 12
	circle(235,390,20);
	
	
	//-- bat den 2 ------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);
	
	//--- in 2 ---------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(325,378,"2"); //-- Giam x 10, giam y 12
	circle(335,390,20);
	
	
	//-- bat den 7 ---------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(585,153,"7"); //-- giam x 15, giam y 17
	circle(600,170,25);
	
	//--- in 7 ----------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(425,378,"7"); //-- Giam x 10, giam y 12
	circle(435,390,20);
	
	
	//--- bat den 1 -----------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); //-- Giam x 15, giam y 17 
	circle(200,270,25);
	
	//-- in 1 ----------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(525,378,"1"); //-- Giam x 10, giam y 12
	circle(535,390,20);

	
	//--- bat den 3 ----------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); //-- Giam x 15, giam y 17 
	circle(400,270,25);
	
	//-- in 3 ------------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(625,378,"3"); //-- Giam x 10, giam y 12
	circle(635,390,20);
	
	
	//--- bat den 6 ---------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- Giam x 15, giam y 17
	circle(500,270,25);
	
	//--- in 6 -----------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(725,378,"6"); //-- Giam x 10, giam y 12
	circle(735,390,20);
	
	
	//--- bat den 8 -------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); //-- Giam x 15, giam y 17
	circle(700,270,25);
	
	//--- in 8 ----------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(825,378,"8"); //-- Giam x 10, giam y 12
	circle(835,390,20);
}
//------------ Duyet Chieu Sau ------------------------------------------
void BatDenVaInSauNLR()
{
	//-- Duyet NLR ----------------------------------------------------
	delay(dl);
	setcolor(3);
	settextstyle(0,0,2);
	outtextxy(75,450,"NLR:");
	rectangle(8,440,195,480);
	
	//--- bat den 5 ---------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); //-- Giam x 15, giam y 17
	circle(450,70,25);
	
	//-- in 5 ---------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(225,448,"5"); //-- Giam x 10, giam y 12
	circle(235,460,20);
	

	
	//-- bat den 2 ------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);
	
	//-- in 2 -----------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(325,448,"2"); //-- Giam x 10, giam y 12
	circle(335,460,20);
	

	
	//--- bat den 1 ------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); //-- Giam x 15, giam y 17 
	circle(200,270,25);
	
	//--- in 1 -----------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(425,448,"1"); //-- Giam x 10, giam y 12
	circle(435,460,20);
	

	
	//-- bat den 3 --------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); // giam x 15, giam y 17
	circle(400,270,25);
	
	//-- in 3 -------------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(525,448,"3"); //-- Giam x 10, giam y 12
	circle(535,460,20);
	

	
	//--- bat den 7 ----------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(585,153,"7"); //-- Giam x 15, giam y 17
	circle(600,170,25);
	
	//---- in 7 --------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(625,448,"7"); //-- Giam x 10, giam y 12
	circle(635,460,20);

	
	//-- bat den 6 -----------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- giam x 17, giam y 17
	circle(500,270,25);	
	
	//--- in 6 ----------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(725,448,"6"); //-- Giam x 10, giam y 12
	circle(735,460,20);
	

	
	//--- bat den 8 -----------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); //-- Giam x 15, giam y 17
	circle(700,270,25);	
	
	//-- in 8 -----------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(825,448,"8"); //-- Giam x 10, giam y 12
	circle(835,460,20);
}
//-----------------------------------------------------------------------------
void BatDenVaInSauLNR()
{
	//-- Duyet LNR -----------------------------------------------------------
	delay(dl);
	setcolor(3);
	settextstyle(0,0,2);
	outtextxy(75,520,"LNR:");
	rectangle(8,510,195,550);
	//-------------------------------------------------------------------------
	
	//-- bat den 1 ------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); //-- Giam x 15, giam y 17 
	circle(200,270,25);	
	
	//--- in 1 -----------------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(225,518,"1"); //-- Giam x 10, giam y 12
	circle(235,530,20);
	
	
			
	//-- bat den 2 -------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);	
	
	//-- in 2 -------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(325,518,"2"); //-- Giam x 10, giam y 12
	circle(335,530,20);
	
	
	//--- bat den 3 -------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); //-- Giam x 15, giam y 17 
	circle(400,270,25);	
	
	//---- in 3 -------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(425,518,"3"); //-- Giam x 10, giam y 12
	circle(435,530,20);
	

	
	//---- bat den 5 -------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); //-- Giam x 15, giam y 17
	circle(450,70,25);	
	
	//--- in 5 -------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(525,518,"5"); //-- Giam x 10, giam y 12
	circle(535,530,20);
	
	
	//--- bat den 6 --------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- Gian x 15, giam y 17
	circle(500,270,25);	
	
	//-- in 6 -------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(625,518,"6"); //-- Giam x 10, giam y 12
	circle(635,530,20);
	
	
	//--- bat den 7 -------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(585,153,"7"); //-- Giam x 15, giam y 17
	circle(600,170,25);	
	
	//-- in 7 ---------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(725,518,"7"); //-- Giam x 10, giam y 12
	circle(735,530,20);
	
	
	//-- bat den 8 ----------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); // giam x 15, giam y 17
	circle(700,270,25);	
	
	//-- in 8 ----------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(825,518,"8"); //-- Giam x 10, giam y 12
	circle(835,530,20);	
}
//-----------------------------------------------------------------------------
void BatDenVaInSauLRN()
{
	//--- Duyet LRN
	delay(dl);
	setcolor(3);
	settextstyle(0,0,2);
	outtextxy(75,590,"LRN:");
	rectangle(8,580,195,620);
	//--------------------------------------------------------------------------------
	
	//-- bat den 1 -------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(185,253,"1"); // giam x 15, giam y 17
	circle(200,270,25);	
	
	//-- in 1 ------------------------------------------------------------------------
	setcolor(14);
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(225,588,"1"); //-- Giam x 10, giam y 12
	circle(235,600,20);
	
		
	//--- bat den 3 -------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(385,253,"3"); //-- Giam x 15, giam y 17 
	circle(400,270,25);
	
	//-- in 3 -------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(325,588,"3"); //-- Giam x 10, giam y 12
	circle(335,600,20);
	
	
		
	//-- bat den 2 --------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(285,153,"2"); //-- Giam x 15, giam y 17 
	circle(300,170,25);	
	
	//-- in 2 --------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(425,588,"2"); //-- Giam x 10, giam y 12
	circle(435,600,20);
	
	
	//--- bat den 6 ---------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(483,253,"6"); //-- Giam x 15, giam y 17 
	circle(500,270,25);	
	
	//--- in 6 --------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(525,588,"6"); //-- Giam x 10, giam y 12
	circle(535,600,20);
	
	
	//-- bat den 7 ------------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(585,153,"7"); //-- giam x 15, giam y 17
	circle(600,170,25);	
	
	//-- in 7 ------------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(625,588,"7"); //-- Giam x 10, giam y 12
	circle(635,600,20);
	
	
	//--- bat den 8 ---------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(685,253,"8"); //-- Giam x 15, giam y 17
	circle(700,270,25);	
	
	//-- in 8 ----------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(725,588,"8"); //-- Giam x 10, giam y 12
	circle(735,600,20);
	
	//--- bat den 5 ---------------------------------------------------------------------------
	delay(dl);
	setcolor(14);
	settextstyle(0,0,4);
	outtextxy(435,53,"5"); //-- Giam x 15, giam y 17
	circle(450,70,25);	
	
	//-- in 5 -----------------------------------------------------------------------------------
	delay(dl);
	settextstyle(1,0,3);
	outtextxy(825,588,"5"); //-- Giam x 10, giam y 12
	circle(835,600,20);
}
//------- Goi ham GRAPHICS ----------------------------------------------------------------------
//-- Duyet chieu rong --------------------------------------------
void DoHoaMoPhongDuyetCayChieuRong()
{
	cout << "1. Duyet cay theo chieu rong: 5 2 7 1 3 6 8";
	TatDen();
	BatDenVaInRong();		
}
//--------------------------------------------------------------------------------
//-- Duyet chieu sau (3 cach) ---------------------------------------------
void DoHoaDuyetLNR()
{
	TatDen();
	BatDenVaInSauLNR();
}
//-----------------------------------------------------------------------------
void DoHoaDuyetLRN()
{
	TatDen();
	BatDenVaInSauLRN();		
}
//------------------------------------------------------------------------------------
void DoHoaDuyetNLR()
{
	TatDen();
	BatDenVaInSauNLR();
}
//------------------------------------------------------------------------------------------------
//----- Menu lua chon 1 trong 2 cach duyet -------------------------------------
void menu1()
{
	cout << "\n\t*******************************************";
	cout << "\n\t** Cac chuc nang chinh cua chuong trinh: **";
	cout << "\n\t*******************************************";
	
	cout << "\n\t**     1. Duyet cay theo chieu rong      **";
	cout << "\n\t*******************************************";
	
	cout << "\n\t**     2. Duyet cay theo chieu sau       **";
	cout << "\n\t*******************************************";
}
//----- Menu duyet cay chieu rong ------------------
void menu2()
{
	cout << "\n\t*************************";
	cout << "\n\t** Hay chon 1 trong 3: **";
	cout << "\n\t*************************";
	
	cout << "\n\t**  1. Tien tu (NLR)   **";
	cout << "\n\t*************************";
	
	cout << "\n\t**  2. Trung tu (LNR)  **";
	cout << "\n\t*************************";
	
	cout << "\n\t**  3. Hau tu (LRN)    **";
	cout << "\n\t*************************";
}
//-------------------------------------------------
void DoHoaMoPhongDuyetCayChieuSau()
{
	//---------------------------------------
	cout << "\n\nLua chon cua ban la? ([1] or [2] or [3]): ";
	cin >> tmp1;
	//-- Duyet Cay theo chieu sau
	//---------------------------------------------------------------------------------------------
	if(tmp1 == 1)
	{
		AnDenNLR();
		cout << "\n  2.1. Duyet theo NLR: 5 2 1 3 7 6 8";
		DoHoaDuyetNLR();
	}
	if(tmp1 == 2)
	{
		AnDenLNR();
		cout << "\n  2.2. Duyet theo LNR: 1 2 3 5 6 7 8";
		DoHoaDuyetLNR();
	}
	if(tmp1 == 3)
	{
		AnDenLRN();
		cout << "\n  2.3. Duyet theo LRN: 1 3 2 6 7 8 5";
		DoHoaDuyetLRN();
	}
	//-----------------------------------------------------------------------------------------
	
}
//---------------------------------------------------------------------------------------------------


//---------------------------------------------------------------------------------------------------
//--- PHAN SINH DUYET CAY (LY THUYET VA MO PHONG)

struct node
{
	int data; //-- node mang gia tri la data.
	node *pleft,*pright; //--- 2 phan lien ket (trai - phai)
};
typedef node* tree;

//---------------------------------------------------------------------------------------------------

//-- Khoi tao cây
void init(tree &t)
{
	t=NULL; //-- gan t = NULL de tranh loi
}
//---------------------------------------------------------------------------------------------------

//-- Tao node moi
node* get_node(int data)
{
	node *p=new node(); //-- tao 1 node moi kieu con tro la p 
	p->data=data; //-- gian gia tri cho node moi = data
	p->pleft=NULL;//-- lien ket trai rong
	p->pright=NULL;//-- lien ket phai rong
	return p;
}

//----------------------------------------------------------------------------------------------------

//-- Them 1 nut bat ky vao cay nhi phan
void insert(tree &t,node *p)
{
	//-- Tim thay vi tri them
	if(t==NULL)
	{
		t=p; //-- nut tao dau tien se la nut goc
	}
	else //-- Neu vi tri them da co gia tri
	{
		//-- Tien hanh so sanh p va t
		if(p->data < t->data)
		{
			//-- p < t thi them vao ben trai
			return insert(t->pleft,p);			
		}
		else 
		if(p->data > t->data)
		{
			//-- p > t thi them vao ben phai
			return insert(t->pright,p);
		}
	}
}

//------------------------------------------------------------------------------------------------

//-- Dau vao cua cay
void input(tree &t)
{
	//-- Goi ham khoi tao
	init(t);
	int data;
	cout << ">> Nhap vao lan luot tung so, cay duoc tao khi nhap 0: \n";
	while(cin>>data) //-- luu gia tri vua nhap vao bien data
	{
		//-- Them data cho cay, khi gap 0 thi dung
		if(data!=0)
		{
			//-- khi data con nhan gia tri != 0 thi them vao cay
			insert(t,get_node(data));
		}
		else
		{
			//-- Neu data = 0 thi dung lai
			break;
		}
	}
}

//------------------------------------------------------------------------------------------------

void SinhCay()
{
	tree t;
	input(t);
	DoHoaMoPhongVeCay();
}

//------------------------------------------------------------------------------------------------
//-------- Phan Duyet Cay

//-- 1. Ham duyet cay nhi phan theo chieu rong
void DuyetCayTheoChieuRong(tree &t) //-- Duyet tu tren xuong, sau do tu trai qua.
{
	// Neu nhu cay co so phan tu (>=1)
	if(t!=NULL)
	{
		//-- Tao queue de luu vet (a)
		queue<tree> a;
		//-- Sau do them vao queue goc
		a.push(t);
		//-- Trong khi queue khac rong
		while(!a.empty())
		{
			//-- Node p co tac dung quay lui lai cac Node truoc do
			node *p=a.front();
			//-- Xuat du lieu 
			cout<<p->data<<" ";
			//-- Xu li xong xoa trong queue
			a.pop();
			//---------------------------------------
			//-- Duyet tu tren xuong va tu trai qua phai
			if(p->pleft!=NULL)
			{
				//-- Day node qua left
				a.push(p->pleft);
			}
			if(p->pright!=NULL)
			{
				//-- Day node qua right
				a.push(p->pright);
			}
		}
	}
}
//---------------------------------------------------------------------------------------------
//-- Ham Duyet theo chieu rong da dong goi
void DuyetCay1()
{
//	tree t;
//	input(t);
//	DuyetCayTheoChieuRong(t);
	DoHoaMoPhongDuyetCayChieuRong();
}
//---------------------------------------------------------------------------------------------
//-- 2. Ham Duyet cay nhi phan theo chieu sau
//----- Duyet LNR ------------------------------------------------------------------------------

void DuyetLNR(tree &t)
{
	if(t == NULL)
		return;
	DuyetLNR(t->pleft);
	cout << t->data << " ";
	DuyetLNR(t->pright);
}

//---------------------------------------------------------------------------------------------

//----- Duyet LRN
void DuyetLRN(tree &t)
{
	if(t == NULL)
		return;
	DuyetLNR(t->pleft);
	DuyetLNR(t->pright);
	cout << t->data << " ";
}

//-----------------------------------------------------------------------------------------------

//----- Duyet NLR
void DuyetNLR(tree &t)
{
	if(t == NULL)
		return;
	cout << t->data << " ";
	DuyetLNR(t->pleft);
	DuyetLNR(t->pright);
}

//-------------------------------------------------------------------------------------------------
//-- Ham Duyet theo chieu sau da dong goi
void DuyetCay2()
{
//	tree t;
//	input(t);
//	DuyetLNR(t);
//	DuyetLRN(t);
//	DuyetNLR(t);
	menu2();
	DoHoaMoPhongDuyetCayChieuSau();
	while(continuee1 == 1)
	{
		cout << "\n\n\nTiep tuc hay dung lai? (tiep tuc [1], dung lai [0]): ";
		cin >> continuee1;
		if(continuee1 == 1)
		{
			DoHoaMoPhongDuyetCayChieuSau();
		}
		else
		{
			cout << "\nChuong trinh ket thuc!!! (da xoa du lieu)";
			exit(0);
		}
	}
}
//-------------------------------------------------------------------------------------------------

//--- Goi ham DuyetCay1 và DuyetCay2
void DuyetCay()
{
	//----------------- Phan Sinh Duyet Cay --------------------------------------------------------
	//-- Dua ra OPTIONS -----------
	cout << "\n\n\nLua chon cua ban la? ([1] or [2]): ";
	cin >> tmp;
	//-- 1. Sinh va Duyet Cay Theo Chieu rong (bfs)
	if(tmp == 1)
	{
		AnDenRong();//-- An cac den duyet chieu rong
		DuyetCay1();//-- Duyet theo chieu rong
	}
	//-- 2. Sinh va Duyet cay theo Chieu sau (dfs)
	if(tmp == 2)
	{
		DuyetCay2(); //-- Duyet theo chieu sau
	}
}




